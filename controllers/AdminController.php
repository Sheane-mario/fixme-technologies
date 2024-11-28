<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Admin;
use app\models\Customer;
use app\models\Technician;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $this->setLayout('auth');
        return $this->render('/admin/dashboard');
    }


    public function manageUsers()
    {
        $this->setLayout('auth');
        return $this->render('/admin/users');
    }

    public function adminSettings()
    {
        $this->setLayout('auth');
        return $this->render('/admin/admin-settings');
    }

    public function adminProfile()

    {
        $this->setLayout('auth');
        return $this->render('/admin/admin-profile');
    }

    public function updateAdminProfile(Request $request)
    {
        $admin = new Admin();
        if ($request->isPost()) {
            $admin->loadData($request->getBody());
            if ($admin->updateValidate()) {
                $admin->updateAdmin();
                Application::$app->session->setFlash('update-success', 'You have been Updated your account info successfully!');
                Application::$app->response->redirect('/admin-profile');
            } else {
                Application::$app->response->redirect('/admin-profile');
            }
        }
    }

    public function viewReports()
    {
        $this->setLayout('auth');
        return $this->render('/admin/reports');
    }

    public function manageServices()
    {
        $this->setLayout('auth');
        return $this->render('/admin/services');
    }

    public function adminLogin()
    {
        $this->setLayout('auth');
        return $this->render('/admin/admin-login.php');
    }


    public function promotions()
    {
        $this->setLayout('auth');
        return $this->render('/admin/admin-promotions');
    }


    public function customers()
    {
        // Fetch all customers records
        $customers = Admin::findAllCustomers();
        // Render the all the customer in the database
        $this->setLayout('auth');
        return $this->render('/admin/customers', ['customers' => $customers]);

    }

    public function technicians()
    {
        // Fetch all technicians records
        $technicians = Admin::findAllTechnicians();
        // Render the all the customer in the database
        $this->setLayout('auth');
        return $this->render('/admin/technicians', ['technicians' => $technicians]);

    }

    public function deleteCustomer(Request $request)
    {
        // Decode JSON payload manually since getBody() does not handle JSON
        $data = json_decode(file_get_contents('php://input'), true);

        // Debug: Log incoming data
        error_log('Request payload: ' . print_r($data, true));

        if (isset($data['cus_id'])) {
            $cus_id = $data['cus_id'];

            // Call the model function to delete the customer
            $result = Admin::deleteCustomerById($cus_id);

            if ($result) {
                // Debug: Log successful deletion
                error_log("Customer with ID $cus_id deleted successfully.");
                echo json_encode(['status' => 'success']);
            } else {
                // Debug: Log failure
                error_log("Failed to delete customer with ID $cus_id.");
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete customer']);
            }
        } else {
            // Debug: Log invalid request
            error_log("Invalid customer ID in request payload.");
            echo json_encode(['status' => 'error', 'message' => 'Invalid customer ID']);
        }
    }


    public function deleteTechnician(Request $request)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['tech_id'])) {
            $tech_id = $data['tech_id'];

            // Call model to delete technician
            $result = Admin::deleteTechnicianById($tech_id);

            if ($result) {
                return $response->json(['status' => 'success']);
            } else {
                return $response->json(['status' => 'error', 'message' => 'Failed to delete technician']);
            }
        } else {
            return $response->json(['status' => 'error', 'message' => 'Invalid technician ID']);
        }
    }


}

