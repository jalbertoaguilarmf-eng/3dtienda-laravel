<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique();
            $table->string('role')->default('designer');
        });

        DB::table('users')
            ->select(['id', 'email'])
            ->orderBy('id')
            ->each(function (object $user): void {
                $base = preg_replace('/[^A-Za-z0-9_]/', '_', Str::before($user->email, '@'));
                $base = trim($base, '_') ?: 'user';
                $username = $base;
                $suffix = 1;

                while (DB::table('users')->where('username', $username)->where('id', '!=', $user->id)->exists()) {
                    $username = $base.'_'.$suffix++;
                }

                DB::table('users')->where('id', $user->id)->update(['username' => $username]);
            });

        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'role']);
        });
    }
};
