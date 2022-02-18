<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('last_name', 60);
            $table->string('email', 100)->unique();
            $table->string('cpf_cnpj', 14)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->boolean('type')->default(1)->comment('0 = Usuário, 1 = Lojista');
            $table->boolean('active')->default(1)->comment('0 = Inativo, 1 = Ativo');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
