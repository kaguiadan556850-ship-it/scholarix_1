<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->longText('personal_statement')->nullable()->after('remarks');
            $table->string('document_path')->nullable()->after('personal_statement');
            $table->timestamp('reviewed_at')->nullable()->after('applied_at');
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected'])->default('pending')->change();
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['personal_statement', 'document_path', 'reviewed_at']);
        });
    }
};
