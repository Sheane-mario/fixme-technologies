<?php
namespace app\core;
abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public function loadData($data){
        foreach($data as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }
    abstract public function rules(): array;
    public array $errors =[];
    public function validate(){
        foreach($this->rules() as $attribute => $rules){
            $value = $this->{$attribute};
            foreach($rules as $rule){
                $ruleName = $rule;
                if(!is_string($rule)){
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                if($ruleName === self::RULE_MATCH && $value!== $this->{$rule['match'] ?? null}){
                    $this->addError($attribute, self::RULE_MATCH, ['match' => $rule['match']]);
                }
            }
        }
        return empty($this->errors);
    }
    public function addError(string $attribute, string $rule, $params = []){
        $fieldLabel = ucfirst($attribute); // Capitalize the first letter of the attribute for better readability
        $message = $this->errorMessages()[$rule] ?? '';
        $message = str_replace('{field}', $fieldLabel, $message);
        foreach ($params as $key => $value) {
            $message = str_replace('{' . $key . '}', $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }
    public function errorMessages(){
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'Invalid email address',
            self::RULE_UNIQUE => 'Email address already exists',
            self::RULE_MIN => 'Minimum length should be {min}',
            self::RULE_MAX => 'Maximum length should be {max}',
            self::RULE_MATCH => 'This field should match with {match}'
        ];
    }
    public function hasError($attribute){
        return $this->errors[$attribute] ?? false;
    }
    /**
     * @return array
     */
    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}