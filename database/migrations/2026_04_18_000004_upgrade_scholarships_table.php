<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->string('category')->after('title')->default('General');
            $table->decimal('amount', 12, 2)->after('description')->default(0);
            $table->longText('requirements')->nullable()->after('description');
            $table->foreignId('created_by')->nullable()->after('status')->constrained('users')->nullOnDelete();
            $table->enum('status', ['draft', 'open', 'reviewing', 'closed'])->default('draft')->change();
        });
    }

    public function down(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->dropConstrainedForeignId('created_by');
            $table->dropColumn(['category', 'amount', 'requirements']);
        });
    }
};
