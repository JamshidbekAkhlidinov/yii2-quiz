<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 11 2023 15:27:11
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\forms;

use kartik\mpdf\Pdf;
use Mpdf\MpdfException;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use yii\base\InvalidConfigException;
use yii\base\Model;

class PdfForm extends Model
{
    public $content;

    public function __construct($content, $config = [])
    {
        $this->content = $content;
        parent::__construct($config);
    }

    /**
     * @throws MpdfException
     * @throws CrossReferenceException
     * @throws InvalidConfigException
     * @throws PdfParserException
     * @throws PdfTypeException
     */
    public function save($path = '')
    {
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_FILE,
            // your html content input
            'content' => $this->content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => [
                '@vendor/ustadev/velzon-template/src/assets/css/bootstrap.min.css'
            ],
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader' => ['Krajee Report Header'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);
        return $pdf->output($this->content, $path,Pdf::DEST_BROWSER);
    }
}