<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('analytics', function (Blueprint $table) {
             $table->id();

            // SESSION & VISITEUR
            $table->string('session_id')->index();
            $table->integer('page_views')->default(1);
            $table->boolean('is_new_visitor')->default(true);

            // LOCALISATION
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('ip_address', 45)->nullable(); // IPv6 support
            $table->string('timezone')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // APPAREIL & SYSTÈME
            $table->enum('device_type', ['Desktop', 'Mobile', 'Tablette'])->default('Desktop');
            $table->string('operating_system')->nullable();
            $table->string('browser')->nullable();
            $table->integer('screen_width')->nullable();
            $table->integer('screen_height')->nullable();
            $table->integer('viewport_width')->nullable();
            $table->integer('viewport_height')->nullable();
            $table->enum('orientation', ['Paysage', 'Portrait'])->nullable();
            $table->boolean('touch_support')->default(false);
            $table->text('user_agent')->nullable();

            // PAGE
            $table->text('url');
            $table->string('path')->index();
            $table->string('page_title')->nullable();
            $table->text('referrer')->nullable();
            $table->string('language', 10)->nullable();

            // TEMPS PASSÉ
            $table->integer('time_spent_seconds')->default(0);
            $table->string('time_spent_formatted')->nullable();

            // COMPORTEMENT
            $table->integer('scroll_percent')->default(0);
            $table->integer('max_scroll_percent')->default(0);

            // TIMESTAMPS
            $table->timestamp('visited_at')->useCurrent();
            $table->timestamps();

            // INDEX pour optimisation des requêtes
            $table->index('created_at');
            $table->index('country');
            $table->index('device_type');
            $table->index('is_new_visitor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics');
    }
};
