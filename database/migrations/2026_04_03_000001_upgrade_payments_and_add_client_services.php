You are a senior Laravel + Next.js engineer.

Fix ALL possible CSRF, Sanctum, session, and authentication issues in my SaaS app (Next.js frontend + Laravel backend).

This is a production system, so make it robust and future-proof.

---

## 🎯 OBJECTIVE

Ensure:

* No CSRF token mismatch errors
* Stable authentication across all pages
* Automatic recovery from expired sessions
* No broken API calls due to auth issues

---

# 🧠 BACKEND FIXES (LARAVEL)

## 1. SANCTUM CONFIG

Check config/sanctum.php:

* Ensure:
  'stateful' includes:

  * localhost:3000

---

## 2. CORS CONFIG

config/cors.php:

Set:

* supports_credentials => true
* allowed_origins => ['http://localhost:3000']
* allowed_methods => ['*']
* allowed_headers => ['*']

---

## 3. SESSION CONFIG

config/session.php:

* driver => cookie
* same_site => 'lax'
* secure => false (for local)

---

## 4. CSRF ROUTES

Ensure:

/sanctum/csrf-cookie route works

---

# 🧠 FRONTEND FIXES (NEXT.JS)

## 1. GLOBAL API CLIENT

Fix axios or fetch config:

* Always send credentials

Example:

axios.defaults.withCredentials = true

---

## 2. CSRF INITIALIZATION

Before ANY protected request:

Call:

GET /sanctum/csrf-cookie

---

Create helper:

initCsrf()

---

## 3. AUTO RETRY SYSTEM

If request fails with:

* 419 (CSRF)
* 401 (unauthorized)

Then:

1. Re-fetch CSRF cookie
2. Retry original request once

---

## 4. GLOBAL API WRAPPER

Wrap all API calls:

* try/catch
* handle errors centrally

---

## 5. SESSION RECOVERY

If retry fails:

* logout user
* redirect to login

---

# 🧠 UX HANDLING

## Show proper messages:

* "Session expired. Please login again."
* NOT raw "CSRF token mismatch"

---

# 🧠 DEBUGGING IMPROVEMENTS

Add:

* Console logs only in dev
* Clear error boundaries

---

# 🧠 PREVENT COMMON ISSUES

Fix:

* Duplicate API calls
* Missing credentials
* Incorrect base URL
* Mixed HTTP/HTTPS
* Cookie domain mismatch

---

# 🧠 TEST CASES

Ensure these scenarios work:

1. Login → works
2. Refresh page → still logged in
3. Idle → session expires → auto recovery OR logout
4. Multiple API calls → no CSRF errors
5. Switching pages → no auth break

---

# 🎯 FINAL RESULT

System should:

* Never show raw CSRF errors
* Handle auth silently
* Recover automatically
* Feel stable and production-ready

---

Implement clean, production-level code without breaking existing APIs.
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('payments')) {
            Schema::table('payments', function (Blueprint $table) {
                if (! Schema::hasColumn('payments', 'project_id')) {
                    $table->foreignId('project_id')->nullable()->after('id')->constrained('projects')->nullOnDelete();
                }

                if (! Schema::hasColumn('payments', 'type')) {
                    $table->enum('type', ['advance', 'final', 'renewal'])->default('advance')->after('project_id');
                }

                if (! Schema::hasColumn('payments', 'amount')) {
                    $table->decimal('amount', 12, 2)->default(0)->after('type');
                }

                if (! Schema::hasColumn('payments', 'due_date')) {
                    $table->date('due_date')->nullable()->after('status');
                }
            });

            if (DB::getDriverName() !== 'sqlite' && Schema::hasColumn('payments', 'status')) {
                DB::statement("ALTER TABLE payments MODIFY status ENUM('pending','paid') NOT NULL DEFAULT 'pending'");
            }

            DB::table('payments')
                ->whereNull('project_id')
                ->whereNotNull('client_id')
                ->orderBy('id')
                ->chunkById(100, function ($rows) {
                    foreach ($rows as $row) {
                        $projectId = DB::table('projects')
                            ->where('client_id', $row->client_id)
                            ->value('id');

                        DB::table('payments')
                            ->where('id', $row->id)
                            ->update([
                                'project_id' => $projectId,
                                'amount' => $row->amount ?? $row->total_amount ?? 0,
                                'type' => $row->type ?? 'advance',
                                'status' => in_array($row->status, ['pending', 'paid'], true) ? $row->status : 'pending',
                            ]);
                    }
                });
        }

        if (! Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->decimal('price', 12, 2)->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('client_services')) {
            Schema::create('client_services', function (Blueprint $table) {
                $table->id();
                $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
                $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
                $table->string('status')->default('active');
                $table->timestamps();

                $table->unique(['client_id', 'service_id']);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('client_services')) {
            Schema::dropIfExists('client_services');
        }

        if (Schema::hasTable('services')) {
            Schema::dropIfExists('services');
        }

        if (Schema::hasTable('payments')) {
            Schema::table('payments', function (Blueprint $table) {
                if (Schema::hasColumn('payments', 'due_date')) {
                    $table->dropColumn('due_date');
                }

                if (Schema::hasColumn('payments', 'amount')) {
                    $table->dropColumn('amount');
                }

                if (Schema::hasColumn('payments', 'type')) {
                    $table->dropColumn('type');
                }

                if (Schema::hasColumn('payments', 'project_id')) {
                    $table->dropConstrainedForeignId('project_id');
                }
            });
        }
    }
};
