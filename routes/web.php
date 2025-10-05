<?php

use App\Http\Controllers\backend\AdminAuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AppointmentController;
use App\Http\Controllers\backend\AssetsController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CallController;
use App\Http\Controllers\backend\ChatController;
use App\Http\Controllers\backend\DepertmentController;
use App\Http\Controllers\backend\DoctorController;
use App\Http\Controllers\backend\DoctorSheduleController;
use App\Http\Controllers\backend\EmailController;
use App\Http\Controllers\backend\EmployeController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\HolidayController;
use App\Http\Controllers\backend\InvoiceController;
use App\Http\Controllers\backend\InvoicesController;
use App\Http\Controllers\backend\LeaveController;
use App\Http\Controllers\backend\LeavesController;
use App\Http\Controllers\backend\PatientController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\paymentsController;
use App\Http\Controllers\backend\ProvidentController;
use App\Http\Controllers\backend\SallaryController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\TaxesController;
use App\Models\Depertment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', [AdminAuthController::class, 'index']);

Auth::routes();
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

//Doctor.........
Route::get('/admin/doctor', [DoctorController::class, 'doctor']);
Route::get('/admin/doctor-add', [DoctorController::class, 'doctorAdd']);
Route::post('/admin/create-doctor/store', [DoctorController::class, 'doctorStore']);
Route::get('/admin/doctor-view/{id}', [DoctorController::class, 'doctorView']);
Route::get('/admin/doctor-edit/{id}', [DoctorController::class, 'doctorEdit']);
Route::post('/admin/doctor-update/{id}', [DoctorController::class, 'doctorUpdate']);
Route::get('/admin/profile-edit/{id}', [DoctorController::class, 'profileEdit']);
Route::post('/admin/profile-update/{id}', [DoctorController::class, 'profileUpdate']);
Route::get('/admin/doctor-delete/{id}', [DoctorController::class, 'doctorDelete']);

//patients.........
Route::get('/admin/patient', [PatientController::class, 'patient']);
Route::get('/admin/patient-add', [PatientController::class, 'patientAdd']);
Route::post('/admin/create-patient/store', [PatientController::class, 'patientStore']);
Route::get('/admin/patient-view/{id}', [PatientController::class, 'patientView']);
Route::get('/admin/patient-edit/{id}', [PatientController::class, 'patientEdit']);
Route::post('/admin/patient-update/{id}', [PatientController::class, 'patientUpdate']);
Route::get('/admin/patient-delete/{id}', [PatientController::class, 'patientDelete']);

//Appoinment.........
Route::get('/admin/appointment', [AppointmentController::class, 'appointment']);
Route::get('/admin/appointment-add', [AppointmentController::class, 'appointmentAdd']);
Route::post('/admin/create-appointment/store', [AppointmentController::class, 'appointmentStore']);
Route::get('/admin/appointment-view/{id}', [AppointmentController::class, 'appointmentView']);
Route::get('/admin/appointment-edit/{id}', [AppointmentController::class, 'appointmentEdit']);
Route::post('/admin/appointment-update/{id}', [AppointmentController::class, 'appointmentUpdate']);
Route::get('/admin/appointment-delete/{id}', [AppointmentController::class, 'appointmentDelete']);

//Doctor Shedule.........
Route::get('/admin/doctorshedule', [DoctorSheduleController::class, 'doctorshedule']);
Route::get('/admin/doctorshedule-add', [DoctorSheduleController::class, 'doctorSheduleAdd']);
Route::post('/admin/create-doctorshedule/store', [DoctorSheduleController::class, 'doctorSheduleStore']);
Route::get('/admin/doctorshedule-view/{id}', [DoctorSheduleController::class, 'doctorSheduleView']);
Route::get('/admin/doctorshedule-edit/{id}', [DoctorSheduleController::class, 'doctorSheduleEdit']);
Route::post('/admin/doctorshedule-update/{id}', [DoctorSheduleController::class, 'doctorSheduleUpdate']);
Route::get('/admin/doctorshedule-delete/{id}', [DoctorSheduleController::class, 'doctorSheduleDelete']);


//Depertment.........
Route::get('/admin/depertment', [DepertmentController::class, 'depertment']);
Route::get('/admin/depertment-add', [DepertmentController::class, 'depertmentAdd']);
Route::post('/admin/create-depertment/store', [DepertmentController::class, 'depertmentStore']);
Route::get('/admin/depertment-view/{id}', [DepertmentController::class, 'depertmentView']);
Route::get('/admin/depertment-edit/{id}', [DepertmentController::class, 'depertmentEdit']);
Route::post('/admin/depertment-update/{id}', [DepertmentController::class, 'depertmentUpdate']);
Route::get('/admin/depertment-delete/{id}', [DepertmentController::class, 'depertmentDelete']);


//Empoloyess.........
Route::get('/admin/employe', [EmployeeController::class, 'employe']);
Route::get('/admin/employe-add', [EmployeeController::class, 'employeAdd']);
Route::post('/admin/create-employe/store', [EmployeeController::class, 'employeStore']);
Route::get('/admin/employe-view/{id}', [EmployeeController::class, 'employeView']);
Route::get('/admin/employe-edit/{id}', [EmployeeController::class, 'employeEdit']);
Route::post('/admin/employe-update/{id}', [EmployeeController::class, 'employeUpdate']);
Route::get('/admin/employe-delete/{id}', [EmployeeController::class, 'employeDelete']);

//Leaves.........
Route::get('/admin/leave', [LeavesController::class, 'leave']);
Route::get('/admin/leave-add', [LeavesController::class, 'leaveAdd']);
Route::post('/admin/create-leave/store', [LeavesController::class, 'leaveStore']);
Route::get('/admin/leave-view/{id}', [LeavesController::class, 'leaveView']);
Route::get('/admin/leave-edit/{id}', [LeavesController::class, 'leaveEdit']);
Route::post('/admin/leave-update/{id}', [LeavesController::class, 'leaveUpdate']);
Route::get('/admin/leave-delete/{id}', [LeavesController::class, 'leaveDelete']);

//Holiday.........
Route::get('/admin/holiday', [HolidayController::class, 'holiday']);
Route::get('/admin/holiday-add', [HolidayController::class, 'holidayAdd']);
Route::post('/admin/create-holiday/store', [HolidayController::class, 'holidayStore']);
Route::get('/admin/holiday-view/{id}', [HolidayController::class, 'holidayView']);
Route::get('/admin/holiday-edit/{id}', [HolidayController::class, 'holidayEdit']);
Route::post('/admin/holiday-update/{id}', [HolidayController::class, 'holidayUpdate']);
Route::get('/admin/holiday-delete/{id}', [HolidayController::class, 'holidayDelete']);

//Invoice.........
Route::get('/admin/invoice', [InvoiceController::class, 'invoice']);
Route::get('/admin/invoice-add', [InvoiceController::class, 'invoiceAdd']);
Route::post('/admin/create-invoice/store', [InvoiceController::class, 'invoiceStore']);
Route::get('/admin/invoice-view/{id}', [InvoiceController::class, 'invoiceView']);
Route::get('/admin/invoice-edit/{id}', [InvoiceController::class, 'invoiceEdit']);
Route::post('/admin/invoice-update/{id}', [InvoiceController::class, 'invoiceUpdate']);
Route::get('/admin/invoice-delete/{id}', [InvoiceController::class, 'invoiceDelete']);

//Payment......
Route::get('/admin/payment', [paymentsController::class, 'payment']);
Route::get('/admin/payment-add', [paymentsController::class, 'paymentAdd']);
Route::post('/admin/create-payment/store', [paymentsController::class, 'paymentStore']);
Route::get('/admin/payment-delete/{id}', [paymentsController::class, 'paymentDelete']);

//Expense.........
Route::get('/admin/expense', [ExpenseController::class, 'expense']);
Route::get('/admin/expense-add', [ExpenseController::class, 'expenseAdd']);
Route::post('/admin/create-expense/store', [ExpenseController::class, 'expenseStore']);
Route::get('/admin/expense-view/{id}', [ExpenseController::class, 'expenseView']);
Route::get('/admin/expense-edit/{id}', [ExpenseController::class, 'expenseEdit']);
Route::post('/admin/expense-update/{id}', [ExpenseController::class, 'expenseUpdate']);
Route::get('/admin/expense-delete/{id}', [ExpenseController::class, 'expenseDelete']);

//Texes.........
Route::get('/admin/taxes', [TaxesController::class, 'taxes']);
Route::get('/admin/taxes-add', [TaxesController::class, 'taxesAdd']);
Route::post('/admin/create-taxes/store', [TaxesController::class, 'taxesStore']);
Route::get('/admin/taxes-view/{id}', [TaxesController::class, 'taxesView']);
Route::get('/admin/taxes-edit/{id}', [TaxesController::class, 'taxesEdit']);
Route::post('/admin/taxes-update/{id}', [TaxesController::class, 'taxesUpdate']);
Route::get('/admin/taxes-delete/{id}', [TaxesController::class, 'taxesDelete']);

//Provent Fund.........
Route::get('/admin/provident', [ProvidentController::class, 'provident']);
Route::get('/admin/provident-add', [ProvidentController::class, 'providentAdd']);
Route::post('/admin/create-provident/store', [ProvidentController::class, 'providentStore']);
Route::get('/admin/provident-view/{id}', [ProvidentController::class, 'providentView']);
Route::get('/admin/provident-edit/{id}', [ProvidentController::class, 'providentEdit']);
Route::post('/admin/provident-update/{id}', [ProvidentController::class, 'providentUpdate']);
Route::get('/admin/provident-delete/{id}', [ProvidentController::class, 'providentDelete']);

//Sallary.........
Route::get('/admin/sallary', [SallaryController::class, 'sallary']);
Route::get('/admin/sallary-add', [SallaryController::class, 'sallaryAdd']);
Route::post('/admin/create-sallary/store', [SallaryController::class, 'sallaryStore']);
Route::get('/admin/sallary-view/{id}', [SallaryController::class, 'sallaryView']);
Route::get('/admin/sallary-edit/{id}', [SallaryController::class, 'sallaryEdit']);
Route::post('/admin/sallary-update/{id}', [SallaryController::class, 'sallaryUpdate']);
Route::get('/admin/sallary-delete/{id}', [SallaryController::class, 'sallaryDelete']);

Route::get('/admin/sallary-view/{id}/export-csv', [SallaryController::class, 'exportCsv']);
Route::get('/admin/sallary-view/{id}/export-pdf', [SallaryController::class, 'exportPdf']);

//Chat.......
Route::get('/admin/chat', [ChatController::class, 'chat']);

//call......
Route::get('/admin/voice-call', [CallController::class, 'voiceCall']);
Route::get('/admin/vedio-call', [CallController::class, 'vedioCall']);

//Email......
Route::get('/admin/compose-email', [EmailController::class, 'composeEmail']);
Route::get('/admin/ixbox-email', [EmailController::class, 'inboxEmail']);
Route::get('/admin/view-email', [EmailController::class, 'viewEmail']);

//Blog.......
Route::get('/admin/blog', [BlogController::class, 'blog']);
Route::get('/admin/blog-add', [BlogController::class, 'blogAdd']);
Route::post('/admin/create-blog/store', [BlogController::class, 'blogStore']);
Route::get('/admin/blog-view/{id}', [BlogController::class, 'blogView']);
Route::get('/admin/blog-edit/{id}', [BlogController::class, 'blogEdit']);
Route::post('/admin/blog-update/{id}', [BlogController::class, 'blogUpdate']);
Route::get('/admin/blog-delete/{id}', [BlogController::class, 'blogDelete']);


//Asset.......
Route::get('/admin/assets', [AssetsController::class, 'assets']);
Route::get('/admin/assets-add', [AssetsController::class, 'assetsAdd']);
Route::post('/admin/assets-blog/store', [AssetsController::class, 'assetsStore']);
Route::get('/admin/assets-view/{id}', [AssetsController::class, 'assetsView']);
Route::get('/admin/assets-edit/{id}', [AssetsController::class, 'assetsEdit']);
Route::post('/admin/assets-update/{id}', [AssetsController::class, 'assetsUpdate']);
Route::get('/admin/assets-delete/{id}', [AssetsController::class, 'assetsDelete']);

//Setting.......
Route::get('/admin/setting', [SettingController::class, 'setting']);
Route::post('/admin/setting/store', [SettingController::class, 'settingStore']);
