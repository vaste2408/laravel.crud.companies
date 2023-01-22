<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('companies') && Schema::hasTable('employees')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->foreignIdFor(Company::class, 'company_id')
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
                $table->index(['company_id', 'created_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
