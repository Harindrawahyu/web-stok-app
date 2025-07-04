<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class AddDatabaseTriggers extends Migration
{
    public function up(): void
    {
        // Tambah stok setelah pesanan supplier masuk
        DB::unprepared('
            CREATE TRIGGER after_insert_order_details
            AFTER INSERT ON order_details
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET stock = stock + NEW.quantity
                WHERE id = NEW.product_id;
            END
        ');

        // Kurangi stok setelah transaksi penjualan
        DB::unprepared('
            CREATE TRIGGER after_insert_transaction_items
            AFTER INSERT ON transaction_items
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET stock = stock - NEW.quantity
                WHERE id = NEW.product_id;
            END
        ');

        // Catat laporan stok (barang masuk)
        DB::unprepared('
            CREATE TRIGGER after_insert_order_details_report
            AFTER INSERT ON order_details
            FOR EACH ROW
            BEGIN
                INSERT INTO stock_reports (product_id, report_type, quantity, content, report_date, created_at, updated_at)
                VALUES (NEW.product_id, "stock_in", NEW.quantity, "From supplier order", CURDATE(), NOW(), NOW());
            END
        ');

        // Catat laporan stok (barang keluar)
        DB::unprepared('
            CREATE TRIGGER after_insert_transaction_items_report
            AFTER INSERT ON transaction_items
            FOR EACH ROW
            BEGIN
                INSERT INTO stock_reports (product_id, report_type, quantity, content, report_date, created_at, updated_at)
                VALUES (NEW.product_id, "stock_out", NEW.quantity, "From sales transaction", CURDATE(), NOW(), NOW());
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_order_details');
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_transaction_items');
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_order_details_report');
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_transaction_items_report');
    }
}
// End of file: database/migrations/2025_07_04_221310_create_add_database_triggers_table.php
// This migration adds triggers to manage stock updates and reports automatically when orders and transactions are processed.