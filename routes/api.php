<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientPortalController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrowthController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\MeetingMinuteController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectStatusController;
use Illuminate\Support\Facades\Route;

Route::post('/meetings/generate-mom', [MeetingController::class, 'generateMoM'])
	->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
	Route::post('/logout', [AuthController::class, 'logoutApi']);
	Route::get('/me', [AuthController::class, 'meApi']);

	Route::middleware('role:admin,growth,client')->group(function () {
		Route::get('/dashboard-stats', [DashboardController::class, 'getStats']);
		Route::get('/priority-tasks', [DashboardController::class, 'priorityTasks']);
		Route::get('/projects', [ProjectController::class, 'index']);
		Route::get('/projects/{id}', [ProjectController::class, 'show']);

		Route::get('/conversations', [ConversationController::class, 'index']);
		Route::get('/conversations/{conversationId}/messages', [ConversationController::class, 'messages']);
		Route::post('/conversations/{conversationId}/messages', [ConversationController::class, 'send']);
		Route::post('/messages', [ConversationController::class, 'send']);
	});

	Route::middleware('role:admin,growth')->group(function () {
		Route::get('/leads', [LeadController::class, 'apiIndex']);
		Route::post('/leads', [LeadController::class, 'apiStore']);
		Route::put('/leads/{id}', [LeadController::class, 'apiUpdate']);
		Route::delete('/leads/{id}', [LeadController::class, 'apiDestroy']);
		Route::post('/leads/{id}/convert', [LeadController::class, 'apiConvert']);

		Route::get('/meetings', [MeetingController::class, 'apiIndex']);
		Route::post('/meetings', [MeetingController::class, 'apiStore']);
		Route::put('/meetings/{id}', [MeetingController::class, 'apiUpdate']);
		Route::delete('/meetings/{id}', [MeetingController::class, 'apiDestroy']);

		Route::get('/clients', [ClientController::class, 'apiIndex']);
		Route::get('/growth/projects', [GrowthController::class, 'projects']);
		Route::get('/growth/dashboard', [GrowthController::class, 'dashboard']);

		Route::post('/meetings/{meetingId}/minutes', [MeetingMinuteController::class, 'store']);
		Route::get('/meetings/{meetingId}/minutes', [MeetingMinuteController::class, 'indexByMeeting']);
		Route::post('/meetings/save-mom', [MeetingMinuteController::class, 'saveGenerated']);
		Route::get('/meetings/mom', [MeetingMinuteController::class, 'momHistory']);
		Route::get('/meeting-minutes/{id}/download', [MeetingMinuteController::class, 'download']);

		Route::get('/notes', [NoteController::class, 'index']);
		Route::post('/notes', [NoteController::class, 'store']);
		Route::delete('/notes/{id}', [NoteController::class, 'destroy']);

		Route::patch('/projects/{id}', [ProjectController::class, 'update']);
		Route::patch('/project-status/{id}', [ProjectStatusController::class, 'updateProjectStatus']);
		Route::patch('/admin/project-status/{id}', [ProjectStatusController::class, 'updateProjectStatus']);
		Route::get('/payments', [PaymentController::class, 'index']);
		Route::post('/payments', [PaymentController::class, 'store']);
		Route::patch('/payments/{id}', [PaymentController::class, 'update']);
	});

	Route::middleware('role:admin')->group(function () {
		Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
		Route::get('/users', [AdminController::class, 'users']);
	});

	Route::middleware('role:client')->group(function () {
		Route::get('/client/portal', [ClientPortalController::class, 'dashboard']);
		Route::get('/client/project-status', [ProjectStatusController::class, 'getClientProjectStatus']);
		Route::get('/client/meetings', [ClientPortalController::class, 'meetings']);
		Route::get('/client/payments', [ClientPortalController::class, 'payments']);
		Route::get('/client/services', [ClientPortalController::class, 'services']);
	});
});
