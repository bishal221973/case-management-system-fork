<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\PartyDetailController;
use App\Http\Controllers\OppositPartyController;
use App\Http\Controllers\InformToPartyController;
use App\Http\Controllers\CaseTypeController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FacilitationController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\DebateController;
use App\Http\Controllers\ReconcilationController;
use App\Http\Controllers\JudgementController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\DistrictCourtController;
use App\Http\Controllers\HighCourtController;
use App\Http\Controllers\SupremeCourtController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
Route::redirect('/', '/login');
Route::get('/registration', 'FrontendController@index')->name('organization.new');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('language/{locale}', 'LanguageController@setLocale')->name('locale');

Route::resources([
    'user' => 'UserController',
    'province' => 'ProvinceController',
    'district' => 'DistrictController',
    'municipality' => 'MunicipalityController',
    'ward' => 'WardController',
]);
// organization
Route::get('organization', [OrganizationController::class, 'index'])->name('organization.index');
Route::get('organization/create', [OrganizationController::class, 'create'])->name('organization.create');
Route::post('organization', [OrganizationController::class, 'store'])->name('organization.store');
Route::get('organization/{organization}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
Route::put('organization/{organization}', [OrganizationController::class, 'update'])->name('organization.update');
Route::delete('organization/{organization}', [OrganizationController::class, 'destroy'])->name('organization.destroy');

// cases
Route::get('cases', [CasesController::class, 'index'])->name('cases.index');
Route::post('cases', [CasesController::class, 'store'])->name('cases.store');
Route::delete('cases/{cases}', [CasesController::class, 'destroy'])->name('cases.destroy');
Route::get('cases/{cases}/edit', [CasesController::class, 'edit'])->name('cases.edit');
// Route::get('cases/{cases}/view', [CasesController::class, 'view'])->name('cases.view');
Route::put('cases/{cases}', [CasesController::class, 'update'])->name('cases.update');
Route::get('cases/create', [CasesController::class, 'create'])->name('cases.create');

// party detail
Route::get('partydetail/{cases}', [PartyDetailController::class, 'index'])->name('partydetail.index');
Route::post('partydetail', [PartyDetailController::class, 'store'])->name('partydetail.store');
Route::get('partydetail/{cases}/create', [PartyDetailController::class, 'create'])->name('partydetail.create');
Route::delete('partydetail/{partyDetail}', [PartyDetailController::class, 'destroy'])->name('partydetail.destroy');
Route::get('partydetail/{partyDetail}/edit', [PartyDetailController::class, 'edit'])->name('partydetail.edit');
Route::put('partydetail/{partyDetail}', [PartyDetailController::class, 'update'])->name('partydetail.update');

//Opposit party detail
Route::get('opposit-party/{cases}', [OppositPartyController::class, 'index'])->name('opposit-party.index');
Route::post('opposit-party', [OppositPartyController::class, 'store'])->name('opposit-party.store');
Route::get('opposit-party/{cases}/create', [OppositPartyController::class, 'create'])->name('opposit-party.create');
Route::delete('opposit-party/{oppositParty}', [OppositPartyController::class, 'destroy'])->name('opposit-party.destroy');
Route::get('opposit-party/{oppositParty}/edit', [OppositPartyController::class, 'edit'])->name('opposit-party.edit');
Route::put('opposit-party/{oppositParty}', [OppositPartyController::class, 'update'])->name('opposit-party.update');

//Inform to party detail
Route::get('inform-to-party/{cases}', [InformToPartyController::class, 'index'])->name('inform-to-party.index');
Route::post('inform-to-party', [InformToPartyController::class, 'store'])->name('inform-to-party.store');
Route::get('inform-to-party/{cases}/create', [InformToPartyController::class, 'create'])->name('inform-to-party.create');
Route::delete('inform-to-party/{informToParty}', [InformToPartyController::class, 'destroy'])->name('inform-to-party.destroy');
Route::get('inform-to-party/{informToParty}/edit', [InformToPartyController::class, 'edit'])->name('inform-to-party.edit');
Route::put('inform-to-party/{informToParty}', [InformToPartyController::class, 'update'])->name('inform-to-party.update');

// 
Route::get('facilation/{cases}', [FacilitationController::class, 'index'])->name('facilation.index');
Route::post('facilation', [FacilitationController::class, 'store'])->name('facilation.store');
Route::get('facilation/{cases}/create', [FacilitationController::class, 'create'])->name('facilation.create');
Route::delete('facilation/{consultation}', [FacilitationController::class, 'destroy'])->name('facilation.destroy');
Route::get('facilation/{consultation}/edit', [FacilitationController::class, 'edit'])->name('facilation.edit');
Route::put('facilation/{consultation}', [FacilitationController::class, 'update'])->name('facilation.update');

// 
Route::get('draft/{cases}', [DraftController::class, 'index'])->name('draft.index');
Route::post('draft', [DraftController::class, 'store'])->name('draft.store');
Route::get('draft/{cases}/create', [DraftController::class, 'create'])->name('draft.create');
Route::delete('draft/{consultation}', [DraftController::class, 'destroy'])->name('draft.destroy');
Route::get('draft/{consultation}/edit', [DraftController::class, 'edit'])->name('draft.edit');
Route::put('draft/{consultation}', [DraftController::class, 'update'])->name('draft.update');



// reconcilation
Route::get('reconcilation/{cases}', [ReconcilationController::class, 'index'])->name('reconcilation.index');
Route::post('reconcilation', [ReconcilationController::class, 'store'])->name('reconcilation.store');
Route::get('reconcilation/{cases}/create', [ReconcilationController::class, 'create'])->name('reconcilation.create');
Route::delete('reconcilation/{consultation}', [ReconcilationController::class, 'destroy'])->name('reconcilation.destroy');
Route::get('reconcilation/{consultation}/edit', [ReconcilationController::class, 'edit'])->name('reconcilation.edit');
Route::put('reconcilation/{consultation}', [ReconcilationController::class, 'update'])->name('reconcilation.update');

// reconcilation
Route::get('judgement/{cases}', [JudgementController::class, 'index'])->name('judgement.index');
Route::post('judgement', [JudgementController::class, 'store'])->name('judgement.store');
Route::get('judgement/{cases}/create', [JudgementController::class, 'create'])->name('judgement.create');
Route::delete('judgement/{consultation}', [JudgementController::class, 'destroy'])->name('judgement.destroy');
Route::get('judgement/{consultation}/edit', [JudgementController::class, 'edit'])->name('judgement.edit');
Route::put('judgement/{consultation}', [JudgementController::class, 'update'])->name('judgement.update');

// PoliceStationController
Route::get('police-station/{cases}', [PoliceStationController::class, 'index'])->name('police-station.index');
Route::post('police-station', [PoliceStationController::class, 'store'])->name('police-station.store');
Route::get('police-station/{cases}/create', [PoliceStationController::class, 'create'])->name('police-station.create');
Route::delete('police-station/{consultation}', [PoliceStationController::class, 'destroy'])->name('police-station.destroy');
Route::get('police-station/{consultation}/edit', [PoliceStationController::class, 'edit'])->name('police-station.edit');
Route::put('police-station/{consultation}', [PoliceStationController::class, 'update'])->name('police-station.update');

// DistrictCourtController
Route::get('district-court/{cases}', [DistrictCourtController::class, 'index'])->name('district-court.index');
Route::post('district-court', [DistrictCourtController::class, 'store'])->name('district-court.store');
Route::get('district-court/{cases}/create', [DistrictCourtController::class, 'create'])->name('district-court.create');
Route::delete('district-court/{consultation}', [DistrictCourtController::class, 'destroy'])->name('district-court.destroy');
Route::get('district-court/{consultation}/edit', [DistrictCourtController::class, 'edit'])->name('district-court.edit');
Route::put('district-court/{consultation}', [DistrictCourtController::class, 'update'])->name('district-court.update');

// HighCourtController
Route::get('high-court/{cases}', [HighCourtController::class, 'index'])->name('high-court.index');
Route::post('high-court', [HighCourtController::class, 'store'])->name('high-court.store');
Route::get('high-court/{cases}/create', [HighCourtController::class, 'create'])->name('high-court.create');
Route::delete('high-court/{consultation}', [HighCourtController::class, 'destroy'])->name('high-court.destroy');
Route::get('high-court/{consultation}/edit', [HighCourtController::class, 'edit'])->name('high-court.edit');
Route::put('high-court/{consultation}', [HighCourtController::class, 'update'])->name('high-court.update');

// SupremeCourtController
Route::get('supreme-court/{cases}', [SupremeCourtController::class, 'index'])->name('supreme-court.index');
Route::post('supreme-court', [SupremeCourtController::class, 'store'])->name('supreme-court.store');
Route::get('supreme-court/{cases}/create', [SupremeCourtController::class, 'create'])->name('supreme-court.create');
Route::delete('supreme-court/{consultation}', [SupremeCourtController::class, 'destroy'])->name('supreme-court.destroy');
Route::get('supreme-court/{consultation}/edit', [SupremeCourtController::class, 'edit'])->name('supreme-court.edit');
Route::put('supreme-court/{consultation}', [SupremeCourtController::class, 'update'])->name('supreme-court.update');

// 
Route::get('debate/{cases}', [DebateController::class, 'index'])->name('debate.index');
Route::post('debate', [DebateController::class, 'store'])->name('debate.store');
Route::get('debate/{cases}/create', [DebateController::class, 'create'])->name('debate.create');
Route::delete('debate/{consultation}', [DebateController::class, 'destroy'])->name('debate.destroy');
Route::get('debate/{consultation}/edit', [DebateController::class, 'edit'])->name('debate.edit');
Route::put('debate/{consultation}', [DebateController::class, 'update'])->name('debate.update');


//Case type
Route::get('case-type/{cases}', [CaseTypeController::class, 'index'])->name('case-type.index');
Route::post('case-type', [CaseTypeController::class, 'store'])->name('case-type.store');
Route::get('case-type/{cases}/create', [CaseTypeController::class, 'create'])->name('case-type.create');
Route::delete('case-type/{caseType}', [CaseTypeController::class, 'destroy'])->name('case-type.destroy');
Route::get('case-type/{caseType}/edit', [CaseTypeController::class, 'edit'])->name('case-type.edit');
Route::put('case-type/{caseType}', [CaseTypeController::class, 'update'])->name('case-type.update');


//Case type
Route::get('consultation/{cases}', [ConsultationController::class, 'index'])->name('consultation.index');
Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::get('consultation/{cases}/create', [ConsultationController::class, 'create'])->name('consultation.create');
Route::delete('consultation/{consultation}', [ConsultationController::class, 'destroy'])->name('consultation.destroy');
Route::get('consultation/{consultation}/edit', [ConsultationController::class, 'edit'])->name('consultation.edit');
Route::put('consultation/{consultation}', [ConsultationController::class, 'update'])->name('consultation.update');

// consultatioons
Route::get('project', [ProjectController::class, 'index'])->name('project.index');
Route::get('project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('project/store', [ProjectController::class, 'store'])->name('project.store');
Route::delete('project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::get('project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('project/{project}', [ProjectController::class, 'update'])->name('project.update');

// Route::get('/data/{key}', 'TableController@index');
// Route::post('/data/{key}', 'TableController@store');
Route::get('data/{slug}/create', 'ResourceTemplateController@create');
Route::post('data/{slug}', 'ResourceTemplateController@store');

Route::get('resources', 'ResourceController@index')->name('resources.index');
Route::get('resources/create', 'ResourceController@create')->name('resources.create');
Route::post('resources', 'ResourceController@store')->name('resources.store');
Route::get('resources/{slug}/edit', 'ResourceController@edit')->name('resources.edit');

Route::post('resources/{slug}/fields', 'ResourceController@saveFields')->name('resources.fields.store');


Route::get('fiscal-year/{fiscalYear?}', 'FiscalYearController@index')->name('fiscal-year.index');
Route::post('fiscal-year', 'FiscalYearController@store')->name('fiscal-year.store');
Route::put('fiscal-year/{fiscalYear}', 'FiscalYearController@update')->name('fiscal-year.update');
Route::delete('fiscal-year/{fiscalYear}', 'FiscalYearController@destroy')->name('fiscal-year.destroy');

// Route::delete('document', 'DocumentController@destroy')->name('ajax.document.destroy');

Route::get('change-password/{user}', 'UserPasswordController@form')->name('password.change.form');
Route::put('change-password/{user}', 'UserPasswordController@change')->name('password.change');

// Route::get('mysettings', 'UserSettingsController@index')->name('user.settings.index');
// Route::post('mysettings', 'UserSettingsController@sync')->name('user.settings.sync');

Route::get('settings', 'SettingsController@index')->name('settings.index');
Route::post('settings', 'SettingsController@sync')->name('settings.sync');

Route::get('configuration-checklist', 'ConfigurationChecklistController@index')->name('configuration-checklist.index');

Route::group(
    [
        'middleware' => ['auth', 'role:super-admin']
    ],
    function () {
        Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
    }
);

Route::any('/{all}', function () {
    return view('app');
})->where(['all' => '.*']);


