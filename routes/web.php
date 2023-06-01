<?php

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;

use App\Http\Livewire\BusinessCase\ApprovalForm;
use App\Http\Livewire\BusinessCase\CostAndBenefitsForm;
use App\Http\Livewire\BusinessCase\DocumentInformationForm;
use App\Http\Livewire\BusinessCase\DocumentInformationList;
use App\Http\Livewire\BusinessCase\DocumentInformationView;
use App\Http\Livewire\BusinessCase\EditApprovalForm;
use App\Http\Livewire\BusinessCase\EditCostAndBenefitsForm;
use App\Http\Livewire\BusinessCase\EditDocumentInformationForm;
use App\Http\Livewire\BusinessCase\EditNotesForm;
use App\Http\Livewire\BusinessCase\NoteForm;
use App\Http\Livewire\Plan\ApprovalForm as PlanApprovalForm;
use App\Http\Livewire\Plan\DocumentInformationForm as PlanDocumentInformationForm;
use App\Http\Livewire\Plan\DocumentInformationList as PlanDocumentInformationList;
use App\Http\Livewire\Plan\DocumentInformationView as PlanDocumentInformationView;
use App\Http\Livewire\Plan\EditApprovalForm as PlanEditApprovalForm;
use App\Http\Livewire\Plan\EditDocumentInformationForm as PlanEditDocumentInformationForm;
use App\Http\Livewire\Plan\EditMonitorAndPrerequisitiesForm;
use App\Http\Livewire\Plan\EditObjectiveForm;
use App\Http\Livewire\Plan\EditProductForm;
use App\Http\Livewire\Plan\EditScheduleForm;
use App\Http\Livewire\Plan\MonitorAndPrerequisitiesForm;
use App\Http\Livewire\Plan\ObjectiveForm;
use App\Http\Livewire\Plan\ProductForm;
use App\Http\Livewire\Plan\ScheduleForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/typography', Typography::class)->name('typography');

    Route::get('/posts', Users::class)->name('post');

    
});

//Business Case

//Document Informations
Route::get('/business_case' , DocumentInformationList::class)->name('business_case.index');
Route::get('business_case/document_information/create' , DocumentInformationForm::class)->name('business_case.create');
Route::get('business_case/document_information/{business_case}/edit' , EditDocumentInformationForm::class)->name('business_case.edit');
Route::get('business_case/document_information/{business_case}/show' , DocumentInformationView::class)->name('business_case.show');


//Approvals
Route::get('business_case/approval/{business_case}/create' , ApprovalForm::class)->name('bc_approval.create');
Route::get('business_case/approval/{business_case}/edit' , EditApprovalForm::class)->name('bc_approval.edit');

//Notes
Route::get('business_case/notes/{business_case}/create' , NoteForm::class)->name('note.create');
Route::get('business_case/notes/{business_case}/edit' , EditNotesForm::class)->name('note.edit');

//Costs And Benefits
Route::get('business_case/costs_and_benefits/{business_case}/create' , CostAndBenefitsForm::class)->name('costs_and_benefits.create');
Route::get('business_case/costs_and_benefits/{business_case}/edit' , EditCostAndBenefitsForm::class)->name('costs_and_benefits.edit');

//PLAN

//Document Informations
Route::get('plan' , PlanDocumentInformationList::class)->name('plan.index');
Route::get('plan/document_information/create' , PlanDocumentInformationForm::class)->name('plan.create');
Route::get('plan/document_information/{plan}/edit' , PlanEditDocumentInformationForm::class)->name('plan.edit');
Route::get('plan/document_information/{plan}/show' , PlanDocumentInformationView::class)->name('plan.show');


//Approvals
Route::get('plan/approval/{plan}/create' , PlanApprovalForm::class)->name('approval.create');
Route::get('plan/approval/{plan}/edit' , PlanEditApprovalForm::class)->name('approval.edit');

//Objectives
Route::get('plan/objective/{plan}/create' , ObjectiveForm::class)->name('objective.create');
Route::get('plan/objective/{plan}/edit/{objective}' , EditObjectiveForm::class)->name('objective.edit');

//Products
Route::get('plan/product/{plan}/create' , ProductForm::class)->name('product.create');
Route::get('plan/product/{plan}/edit' , EditProductForm::class)->name('product.edit');

//Monitoring & Prerequisities
Route::get('plan/monitor_prerequisities/{plan}/create' , MonitorAndPrerequisitiesForm::class)->name('monitor_prerequisities.create');
Route::get('plan/monitor_prerequisities/{plan}/edit' , EditMonitorAndPrerequisitiesForm::class)->name('monitor_prerequisities.edit');

//Schedule
Route::get('plan/schedule/{plan}/create' , ScheduleForm::class)->name('schedule.create');
Route::get('plan/schedule/{plan}/edit' , EditScheduleForm::class)->name('schedule.edit');
