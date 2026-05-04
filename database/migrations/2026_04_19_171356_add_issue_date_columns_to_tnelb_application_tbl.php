<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Adds the "Date of Issue" columns that pair with the existing validity
     * date columns used by Form S / W / WH:
     *   - previously_issue_date  -> issue date for `previously_number`
     *                               (Q7 on Form S, Q7 on Form W, Q6 on Form WH)
     *   - certificate_issue_date -> issue date for `certificate_no`
     *                               (Q8 on Form S)
     */
    public function up()
    {
        Schema::table('tnelb_application_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('tnelb_application_tbl', 'previously_issue_date')) {
                $table->date('previously_issue_date')->nullable()->after('previously_date');
            }
            if (!Schema::hasColumn('tnelb_application_tbl', 'certificate_issue_date')) {
                $table->date('certificate_issue_date')->nullable()->after('certificate_date');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tnelb_application_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('tnelb_application_tbl', 'previously_issue_date')) {
                $table->dropColumn('previously_issue_date');
            }
            if (Schema::hasColumn('tnelb_application_tbl', 'certificate_issue_date')) {
                $table->dropColumn('certificate_issue_date');
            }
        });
    }
};
