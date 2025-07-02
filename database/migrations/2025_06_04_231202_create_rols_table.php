 <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB; // <-- Asegúrate de importar esto

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('rols', function (Blueprint $table) {
                $table->id();
                $table->string('tipo', 50)->nullable();
                $table->timestamps();
            });

            DB::table('rols')->insert([
                ['id' => 1, 'tipo' => 'admin', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'tipo' => 'usuario', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'tipo' => 'empleado', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('rols');
        }
    };
