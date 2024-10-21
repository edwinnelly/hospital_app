<?php
// ----------------------------------------------------------------
//fetcher from the specialized dpt
$specializations_sql = "select * from specializations";
// ----------------------------------------------------------------
//fetcher from the department
$department_sql = "select * from department";
// ----------------------------------------------------------------
//fetcher from the emp leave 
$leave_request = "SELECT d.*, s.firstname, s.lastname,s.staff_id FROM leave_request d LEFT JOIN staffs_accounts s ON d.emp_id = s.id GROUP BY d.id,s.firstname, s.lastname";
// ----------------------------------------------------------------
//fetcher from the hmo
$hmo_sql = "SELECT * FROM hmo";

//fetcher from the ward
$wards_sql = "SELECT * FROM wards";
// ----------------------------------------------------------------
//fetcher from the patient table 
$patient_records_sql = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id";
// ----------------------------------------------------------------
//fetcher from the DEPARTMENT table and leadership
$department_leaders_sql = "SELECT d.*, s.firstname, s.lastname, (SELECT COUNT(id) FROM staffs_accounts WHERE department_id = d.id) AS staffs_in_department FROM department d LEFT JOIN staffs_accounts s ON d.leader = s.id GROUP BY d.id, s.firstname, s.lastname";
// ----------------------------------------------------------------
//fetcher from the asset table
$asset_sql = "SELECT * FROM asset";

//fetcher from the asset table
$services_hospital = "SELECT * FROM services_hospital order by name asc";

//fetch all the hmo request from admin end
$hmo_request="SELECT hpr.patient_id, hpr.hmo_id, hpr.service_id, hpr.request_date,hpr.docid, pd.patient_name,
hpr.request_date FROM hmo_payment_requests hpr JOIN patient_data pd ON hpr.patient_id = pd.pid WHERE hpr.status = 'pending' GROUP BY hpr.patient_id";


//fetch all the hmo request from admin end
$hmo_request_clear="SELECT hpr.patient_id, hpr.hmo_id, hpr.service_id, hpr.request_date,hpr.docid, pd.patient_name,
hpr.request_date FROM hmo_payment_requests hpr JOIN patient_data pd ON hpr.patient_id = pd.pid WHERE hpr.status = 'paid' GROUP BY hpr.patient_id";



// ----------------------------------------------------------------
//fetcher from the staff table
$staff_details_sql = "select * from staffs_accounts";
// ----------------------------------------------------------------
//fetcher from the account table
$account_list_sql = "SELECT * FROM account_list";
// ----------------------------------------------------------------
// fetcher from the expense table
$expense_sql = "SELECT * FROM expense_category";
// ----------------------------------------------------------------
// fetcher from the kit table
$kit_sql = "SELECT * FROM lab_kit";
// ----------------------------------------------------------------
// fetcher from the kit table type sample
$kit_sample_sql = "SELECT * FROM lab_kit where kit_type='sample'";
// ----------------------------------------------------------------
// fetcher from the kit table type containers
$kit_containers_sql = "SELECT * FROM lab_kit where kit_type='containers'";

// ----------------------------------------------------------------
// fetcher from the kit table type sample
$kit_Restrictions_sql = "SELECT * FROM lab_kit where kit_type='Restrictions'";

// ----------------------------------------------------------------
// function to get the data for the lab test table,
$lab_test_list_sql = "SELECT lab_test_case.id,lab_test_case.dpt,lab_test_case.ranges_test,lab_test_case.unit,lab_test_case.tat,lab_test_case.created_date,lab_test_case.test_price as amount, lab_test_case.test_name, lab_test_case.test_price, department.department_name, lab_kit_samples.kit_name as sample_kit_name, lab_kit_containers.kit_name as container_kit_name, lab_kit_restrictions.kit_name as restrictions_kit_name FROM lab_test_case LEFT JOIN department ON department.id = lab_test_case.dpt LEFT JOIN lab_kit AS lab_kit_samples ON lab_kit_samples.id = lab_test_case.sample LEFT JOIN lab_kit AS lab_kit_containers ON lab_kit_containers.id = lab_test_case.container LEFT JOIN lab_kit AS lab_kit_restrictions ON lab_kit_restrictions.id = lab_test_case.restrictions";

// ----------------------------------------------------------------
// fetcher patient lab quuee tester table
$patient_lab_quuee_sql = "select patient_test.*,patient_data.* from patient_test JOIN patient_data ON patient_test.patient_id=patient_data.pid GROUP by patient_test.patient_id order by patient_test.id desc";

// ----------------------------------------------------------------
//fetcher from the DEPARTMENT LAB table and leadership
$department_lab_sql = "SELECT d.*, s.firstname, s.lastname, (SELECT COUNT(dpt) FROM patient_test WHERE dpt = d.id and status=2) AS staffs_in_department FROM department d LEFT JOIN staffs_accounts s ON d.leader = s.id GROUP BY d.id, s.firstname, s.lastname";

// ----------------------------------------------------------------
//fetcher from the DEPARTMENT LAB table and result approval
$department_lab_approval_sql = "SELECT d.*, s.firstname, s.lastname, (SELECT COUNT(dpt) FROM patient_test WHERE dpt = d.id and status=3) AS staffs_in_department FROM department d LEFT JOIN staffs_accounts s ON d.leader = s.id GROUP BY d.id, s.firstname, s.lastname";

// ----------------------------------------------------------------
// Build drug table
$drug_list_sql = "SELECT * from drug_list where status =0";

// ----------------------------------------------------------------
// Build drug brand table 
$drug_brand_category = " SELECT * FROM drug_brand_category where status =0";

// ----------------------------------------------------------------
// Build drug list table
$drug_lists_sql = "SELECT drugs_list.*, drug_brand_category.category_name as brandname, drug_supplier.supplier,drug_category.category_name FROM drugs_list JOIN drug_category ON drugs_list.category_id = drug_category.id JOIN drug_supplier ON drugs_list.suppliers_id = drug_supplier.id JOIN drug_brand_category ON drugs_list.brand_id = drug_brand_category.id";

// --------------------------------------------------
// fetch the drug category information  
$drugs_category_sql = "SELECT * FROM drug_category";

// --------------------------------------------------
// fetch the brand drug category information  
$drugs_category_brand_sql = "SELECT * FROM drug_brand_category";

// --------------------------------------------------
// fetch the  drug supplier category information  
$drug_supplier_sql = "SELECT * FROM drug_supplier";


// --------------------------------------------------
// fetch the EMP information  
$employee_data_sql = "SELECT * FROM staffs_accounts JOIN department ON staffs_accounts.department_id = department.id JOIN specializations ON staffs_accounts.specialist_id = specializations.id";

// ---------------------------------------------------
// fetch the unpaid purchase order
$unpaid_purchase_order_sql = "SELECT purchase_order.*, drugs_list.drugs_name FROM purchase_order,drugs_list WHERE purchase_order.pid=drugs_list.id and purchase_order.send_to_account='no'";


// ---------------------------------------------------
// fetch the unpaid purchase order
$unpaid_purchase_order_new_sql = "SELECT purchase_order.*, drugs_list.drugs_name FROM purchase_order,drugs_list WHERE purchase_order.pid=drugs_list.id and purchase_order.send_to_account='no'";

// ---------------------------------------------------
// fetch the unpaid purchase order
$paid_purchase_order_sql = "SELECT purchase_order.*, drugs_list.drugs_name FROM purchase_order,drugs_list WHERE purchase_order.pid=drugs_list.id and purchase_order.send_to_account='paid'";

// ---------------------------------------------------
// fetch the unpaid purchase order
$unpaid_purchase_order_account_sql = "SELECT purchase_order.*, drugs_list.drugs_name FROM purchase_order,drugs_list WHERE purchase_order.pid=drugs_list.id and purchase_order.send_to_account='yes'";

// ---------------------------------------------------
// fetch the unpaid purchase order from account moudle
$sum_purchase_account_sql = "select sum(amount) as total_pending from purchase_order WHERE send_to_account='yes'";

// ---------------------------------------------------
// fetch the unpaid purchase order from account moudle
$sum_purchase_new__account_sql = "select sum(amount) as total_pending from purchase_order WHERE send_to_account='no'";

// ---------------------------------------------------
// fetch the unpaid purchase order
$completed_purchase_order_sql = "SELECT purchase_order.*,purchase_order.qty as pos_qty, drugs_list.drugs_name,drugs_list.qty FROM purchase_order,drugs_list WHERE purchase_order.pid=drugs_list.id and purchase_order.send_to_account='paid' and payment_status='yes' and purchase_order.status='0'";

// ----------------------------------------------------------------
//fetcher from the radiography
$radio_departments_sql = "SELECT * FROM radio_departments";

// ---------------------------------------------
//fetch the radio test list and amount
//Aliasing: Using aliases (rgt for radio_graphy_test and rd for radio_departments) 
$radio_test_list_sql = "SELECT rgt.*, rd.DepartmentName FROM radio_graphy_test AS rgt JOIN radio_departments AS rd ON rgt.radio_dpt = rd.DepartmentID
";


// ----------------------------------------------------------------
// fetcher patient radio quuee tester table
$patient_radio_quuee_sql = "select patient_test_radio.*,patient_data.* from patient_test_radio JOIN patient_data ON patient_test_radio.patient_id=patient_data.pid GROUP by patient_test_radio.patient_id order by patient_test_radio.id DESC";


// -----------------------------------------------
// fetch the active ptr test / cases
$active_ptr_test_sql = "SELECT d.*, COUNT(ptr.dpt) AS live_tst
FROM radio_departments d
JOIN patient_test_radio ptr ON d.DepartmentID = ptr.dpt
WHERE ptr.status = 1
GROUP BY d.DepartmentID
HAVING live_tst != 0;
";