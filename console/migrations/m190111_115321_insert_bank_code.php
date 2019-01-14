<?php

use yii\db\Migration;

/**
 * Class m190111_115321_insert_bank_code
 */
class m190111_115321_insert_bank_code extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $bankArray = [
            ['BANK BRI', '002',0,1547207486,1547207486],
            ['BANK EKSPOR INDONESIA', '003',0,1547207486,1547207486],
            ['BANK MANDIRI', '008',0,1547207486,1547207486],
            ['BANK BNI', '009',0,1547207486,1547207486],
            ['BANK DANAMON', '011',0,1547207486,1547207486],
            ['PERMATA BANK', '013',0,1547207486,1547207486],
            ['BANK BCA', '014',0,1547207486,1547207486],
            ['BANK BII', '016',0,1547207486,1547207486],
            ['BANK PANIN', '019',0,1547207486,1547207486],
            ['BANK ARTA NIAGA KENCANA', '020',0,1547207486,1547207486],
            ['BANK NIAGA', '022',0,1547207486,1547207486],
            ['BANK BUANA IND', '023',0,1547207486,1547207486],
            ['BANK LIPPO', '026',0,1547207486,1547207486],
            ['BANK NISP', '028',0,1547207486,1547207486],
            ['AMERICAN EXPRESS BANK LTD', '030',0,1547207486,1547207486],
            ['CITIBANK N.A.', '031',0,1547207486,1547207486],
            ['JP. MORGAN CHASE BANK, N.A.', '032',0,1547207486,1547207486],
            ['BANK OF AMERICA, N.A', '033',0,1547207486,1547207486],
            ['ING INDONESIA BANK', '034',0,1547207486,1547207486],
            ['BANK MULTICOR TBK.', '036',0,1547207486,1547207486],
            ['BANK ARTHA GRAHA', '037',0,1547207486,1547207486],
            ['BANK CREDIT AGRICOLE INDOSUEZ', '039',0,1547207486,1547207486],
            ['THE BANGKOK BANK COMP. LTD', '040',0,1547207486,1547207486],
            ['THE HONGKONG & SHANGHAI B.C.', '041',0,1547207486,1547207486],
            ['THE BANK OF TOKYO MITSUBISHI UFJ LTD', '042',0,1547207486,1547207486],
            ['BANK SUMITOMO MITSUI INDONESIA', '045',0,1547207486,1547207486],
            ['BANK DBS INDONESIA', '046',0,1547207486,1547207486],
            ['BANK RESONA PERDANIA', '047',0,1547207486,1547207486],
            ['BANK MIZUHO INDONESIA', '048',0,1547207486,1547207486],
            ['STANDARD CHARTERED BANK', '050',0,1547207486,1547207486],
            ['BANK ABN AMRO', '052',0,1547207486,1547207486],
            ['BANK KEPPEL TATLEE BUANA', '053',0,1547207486,1547207486],
            ['BANK CAPITAL INDONESIA, TBK.', '054',0,1547207486,1547207486],
            ['BANK BNP PARIBAS INDONESIA', '057',0,1547207486,1547207486],
            ['BANK UOB INDONESIA', '058',0,1547207486,1547207486],
            ['KOREA EXCHANGE BANK DANAMON', '059',0,1547207486,1547207486],
            ['RABOBANK INTERNASIONAL INDONESIA', '060',0,1547207486,1547207486],
            ['ANZ PANIN BANK', '061',0,1547207486,1547207486],
            ['DEUTSCHE BANK AG.', '067',0,1547207486,1547207486],
            ['BANK WOORI INDONESIA', '068',0,1547207486,1547207486],
            ['BANK OF CHINA LIMITED', '069',0,1547207486,1547207486],
            ['BANK BUMI ARTA', '076',0,1547207486,1547207486],
            ['BANK EKONOMI', '087',0,1547207486,1547207486],
            ['BANK ANTARDAERAH', '088',0,1547207486,1547207486],
            ['BANK HAGA', '089',0,1547207486,1547207486],
            ['BANK IFI', '093',0,1547207486,1547207486],
            ['BANK CENTURY, TBK.', '095',0,1547207486,1547207486],
            ['BANK MAYAPADA', '097',0,1547207486,1547207486],
            ['BANK JABAR', '110',0,1547207486,1547207486],
            ['BANK DKI', '111',0,1547207486,1547207486],
            ['BPD DIY', '112',0,1547207486,1547207486],
            ['BANK JATENG', '113',0,1547207486,1547207486],
            ['BANK JATIM', '114',0,1547207486,1547207486],
            ['BPD JAMBI', '115',0,1547207486,1547207486],
            ['BPD ACEH', '116',0,1547207486,1547207486],
            ['BANK SUMUT', '117',0,1547207486,1547207486],
            ['BANK NAGARI', '118',0,1547207486,1547207486],
            ['BANK RIAU', '119',0,1547207486,1547207486],
            ['BANK SUMSEL', '120',0,1547207486,1547207486],
            ['BANK LAMPUNG', '121',0,1547207486,1547207486],
            ['BPD KALSEL', '122',0,1547207486,1547207486],
            ['BPD KALIMANTAN BARAT', '123',0,1547207486,1547207486],
            ['BPD KALTIM', '124',0,1547207486,1547207486],
            ['BPD KALTENG', '125',0,1547207486,1547207486],
            ['BPD SULSEL', '126',0,1547207486,1547207486],
            ['BANK SULUT', '127',0,1547207486,1547207486],
            ['BPD NTB', '128',0,1547207486,1547207486],
            ['BPD BALI', '129',0,1547207486,1547207486],
            ['BANK NTT', '130',0,1547207486,1547207486],
            ['BANK MALUKU', '131',0,1547207486,1547207486],
            ['BPD PAPUA', '132',0,1547207486,1547207486],
            ['BANK BENGKULU', '133',0,1547207486,1547207486],
            ['BPD SULAWESI TENGAH', '134',0,1547207486,1547207486],
            ['BANK SULTRA', '135',0,1547207486,1547207486],
            ['BANK NUSANTARA PARAHYANGAN', '145',0,1547207486,1547207486],
            ['BANK SWADESI', '146',0,1547207486,1547207486],
            ['BANK MUAMALAT', '147',0,1547207486,1547207486],
            ['BANK MESTIKA', '151',0,1547207486,1547207486],
            ['BANK METRO EXPRESS', '152',0,1547207486,1547207486],
            ['BANK SHINTA INDONESIA', '153',0,1547207486,1547207486],
            ['BANK MASPION', '157',0,1547207486,1547207486],
            ['BANK HAGAKITA', '159',0,1547207486,1547207486],
            ['BANK GANESHA', '161',0,1547207486,1547207486],
            ['BANK WINDU KENTJANA', '162',0,1547207486,1547207486],
            ['HALIM INDONESIA BANK', '164',0,1547207486,1547207486],
            ['BANK HARMONI INTERNATIONAL', '166',0,1547207486,1547207486],
            ['BANK KESAWAN', '167',0,1547207486,1547207486],
            ['BANK TABUNGAN NEGARA (PERSERO)', '200',0,1547207486,1547207486],
            ['BANK HIMPUNAN SAUDARA 1906, TBK .', '212',0,1547207486,1547207486],
            ['BANK TABUNGAN PENSIUNAN NASIONAL', '213',0,1547207486,1547207486],
            ['BANK SWAGUNA', '405',0,1547207486,1547207486],
            ['BANK JASA ARTA', '422',0,1547207486,1547207486],
            ['BANK MEGA', '426',0,1547207486,1547207486],
            ['BANK JASA JAKARTA', '427',0,1547207486,1547207486],
            ['BANK BUKOPIN', '441',0,1547207486,1547207486],
            ['BANK SYARIAH MANDIRI', '451',0,1547207486,1547207486],
            ['BANK BISNIS INTERNASIONAL', '459',0,1547207486,1547207486],
            ['BANK SRI PARTHA', '466',0,1547207486,1547207486],
            ['BANK JASA JAKARTA', '472',0,1547207486,1547207486],
            ['BANK BINTANG MANUNGGAL', '484',0,1547207486,1547207486],
            ['BANK BUMIPUTERA', '485',0,1547207486,1547207486],
            ['BANK YUDHA BHAKTI', '490',0,1547207486,1547207486],
            ['BANK MITRANIAGA', '491',0,1547207486,1547207486],
            ['BANK AGRO NIAGA', '494',0,1547207486,1547207486],
            ['BANK INDOMONEX', '498',0,1547207486,1547207486],
            ['BANK ROYAL INDONESIA', '501',0,1547207486,1547207486],
            ['BANK ALFINDO', '503',0,1547207486,1547207486],
            ['BANK SYARIAH MEGA', '506',0,1547207486,1547207486],
            ['BANK INA PERDANA', '513',0,1547207486,1547207486],
            ['BANK HARFA', '517',0,1547207486,1547207486],
            ['PRIMA MASTER BANK', '520',0,1547207486,1547207486],
            ['BANK PERSYARIKATAN INDONESIA', '521',0,1547207486,1547207486],
            ['BANK AKITA', '525',0,1547207486,1547207486],
            ['LIMAN INTERNATIONAL BANK', '526',0,1547207486,1547207486],
            ['ANGLOMAS INTERNASIONAL BANK', '531',0,1547207486,1547207486],
            ['BANK DIPO INTERNATIONAL', '523',0,1547207486,1547207486],
            ['BANK KESEJAHTERAAN EKONOMI', '535',0,1547207486,1547207486],
            ['BANK UIB', '536',0,1547207486,1547207486],
            ['BANK ARTOS IND', '542',0,1547207486,1547207486],
            ['BANK PURBA DANARTA', '547',0,1547207486,1547207486],
            ['BANK MULTI ARTA SENTOSA', '548',0,1547207486,1547207486],
            ['BANK MAYORA', '553',0,1547207486,1547207486],
            ['BANK INDEX SELINDO', '555',0,1547207486,1547207486],
            ['BANK VICTORIA INTERNATIONAL', '566',0,1547207486,1547207486],
            ['BANK EKSEKUTIF', '558',0,1547207486,1547207486],
            ['CENTRATAMA NASIONAL BANK', '559',0,1547207486,1547207486],
            ['BANK FAMA INTERNASIONAL', '562',0,1547207486,1547207486],
            ['BANK SINAR HARAPAN BALI', '564',0,1547207486,1547207486],
            ['BANK HARDA', '567',0,1547207486,1547207486],
            ['BANK FINCONESIA', '945',0,1547207486,1547207486],
            ['BANK MERINCORP', '946',0,1547207486,1547207486],
            ['BANK MAYBANK INDOCORP', '947',0,1547207486,1547207486],
            ['BANK OCBC – INDONESIA', '948',0,1547207486,1547207486],
            ['BANK CHINA TRUST INDONESIA', '949',0,1547207486,1547207486],
            ['BANK COMMONWEALTH', '950',0,1547207486,1547207486]
        ];
        $this->batchInsert('{{%master_bank}}', ['name', 'code', 'isDeleted', 'created_at', 'updated_at'],$bankArray);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190111_115321_insert_bank_code cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190111_115321_insert_bank_code cannot be reverted.\n";

        return false;
    }
    */
}