<?php
class SendMail
{
	public function send($to = '', $from, $subject, $title1, $title2, $topText, $bottomText)
	{
		/* сообщение */
		$message = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html>
		    <head>
		        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		        <title>Web Holder</title>
		        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800" rel="stylesheet">

		    </head>
		    <body style="margin:0 auto;">
		        <table border="0" cellpadding="0" border-spacing="0" cellspacing="0" width="800px" height="1080px" style="border-spacing:0; margin: 0 auto; background-color: #161616; color: #fff">
		            <tbody>
		                <tr height="251px" width="100%" style="background-image: url(https://gallery.mailchimp.com/a07a1c5a03ea6c2d738ec5edd/images/8faf92f2-2ad8-4a89-880d-5d48bfbf2b40.png); background-repeat: no-repeat;">
		                    <td height="251px" valign="center" align="center"><a href="index.html"><img src="https://gallery.mailchimp.com/a07a1c5a03ea6c2d738ec5edd/images/110c05c1-85ca-4305-b943-51cf4b64c0ca.png" alt="logo"></a></td>
		                </tr>
		                <tr height="71px">
		                	<td align="center">
		                		<h1 style="margin: 0; padding-top: 55px; color: #fff; font-size: 24px; font-family:"Raleway";font-weight: 500;text-transform: uppercase;">
		                			'.$title1.'
	                			</h1>
	                		</td>
                		</tr>
		                <tr height="25px">
		                	<td align="center">
		                		<h2 style="margin: 0; padding: 0px; color: #fcff23; font-size: 24px; font-family:"Raleway";font-weight: 500;text-transform: uppercase;">
		                			'.$title2.'
	                			</h2>
	                		</td>
                		</tr>
		                <tr>
		                
		                    <td height="110px" style="padding: 20px;">
	                    		<p width="70%" style="margin: 50px 16%; line-height: 22px; font-family:"Raleway"; font-size: 16px; color:#fff; font-weight: 300;">
	                    			'.$topText.'
		                        </p>
		                    </td>
		                    
		                </tr>
		                <tr>
		                    <td height="258px" style="padding: 20px;">
		                        <p width="70%" style="margin: 50px 16%; line-height: 22px; font-family:"Raleway"; font-size: 16px; color:#fff; font-weight: 300;">
	                    			'.$bottomText.'
		                        </p>
		                    </td>
		                </tr>
		                <tr> 
		                    <td>
		                        <table border="0" cellpadding="0" border-spacing="0" cellspacing="0" width="100%" height="255px" style="border-spacing:0;">
		                            <tbody>
		                                <tr bgcolor="#ffffff" height="130px" width="100%" style="padding: 0 42px">
		                                  <td width="42px"></td>  
		                                  <td style="padding-left: 42px; width: 172px; background-color: #fcff23; color:#000;">
		                                    <h3 style="font-size: 21px; font-weight: 700; color:#000; font-family:"Raleway"; >Take a stand,<br>
		                                    Think different.</h3>
		                                    </td>
		                                    <td></td>
		                                    <td align="right" style="padding-right: 40px;">
		                                        <h4 style="font-size: 21px; font-weight: 700; margin-bottom: 0; font-family:"Raleway"; color: #020202">Contacts</h4>
		                                        <p style="color:#000;">Località Pasina 46 <br>
		                                            38066 Riva del Garda (TN) <br>
		                                            IT01764100226</p>
		                                        </td> 
		                                    <td></td>     
		                                </tr>
		                                <tr bgcolor="#ffffff" height="85px" width="100%">
		                                    <td style="border-top:3px solid #020202;"></td>
		                                    
		                                    <td style="border-top:3px solid #020202; color: #000;">
		                                        <table>
		                                            <tbody>
		                                              <tr style="list-style: none;">
		                                                <td style="padding-left: 42px;" width="74px">Follow us:</td>    
		                                                <td><a href="https://www.linkedin.com/company/web-holder?trk=mini-profile"><img width="32" src="https://gallery.mailchimp.com/a07a1c5a03ea6c2d738ec5edd/images/57b1a846-65f8-4966-b6df-b59835c09c0c.png" alt="facebook"></a></td>
		                                                <td></td>
		                                                <td></td>
		                                                <td></td>
		                                                <td></td>
		                                            </tr>  
		                                        </tbody>
		                                        </table>
		                                        
		                                    </td>
		                                    <td></td>
		                                    <td align="right" style="color:#000; border-top:3px solid #020202; padding-right: 42px">
		                                        All rights reserved
		                                    </td>
		                                    <td></td>
		                                </tr> 
		                                
		                            </tbody>
		                        </table>
		                    </td>
		                    
		                </tr>

		            </tbody>

		        </table>
		    </body>
		</html>
		';

		/* Для отправки HTML-почты вы можете установить шапку Content-type. */
		$headers= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";

		/* дополнительные шапки */
		$headers .= "From: Web Holder <".$from.">\r\n";

		/* и теперь отправим из */
		mail($to, $subject, $message, $headers);
	}

	public function timeOut($arrEmailAdress, $time, $subject, $from, $title1, $title2, $topText, $bottomText)
	{
		$i = 0;
		foreach ($arrEmailAdress as $key => $email) {
			$this-> send($email, $from, $subject, $title1, $title2, $topText, $bottomText);
			sleep($time);
			$i++;
		}

		return $i;
	}

	public function getXLS($xls){
	    include_once 'Classes/PHPExcel/IOFactory.php';
	    $objPHPExcel = PHPExcel_IOFactory::load($xls);
	    $objPHPExcel->setActiveSheetIndex(0);
	    $aSheet = $objPHPExcel->getActiveSheet();
	 
	    //этот массив будет содержать массивы содержащие в себе значения ячеек каждой строки
	    $array = array();
	    //получим итератор строки и пройдемся по нему циклом
	    foreach($aSheet->getRowIterator() as $row){
	      //получим итератор ячеек текущей строки
	      $cellIterator = $row->getCellIterator();
	      //пройдемся циклом по ячейкам строки
	      //этот массив будет содержать значения каждой отдельной строки
	      $item = array();
	      foreach($cellIterator as $cell){
	        //заносим значения ячеек одной строки в отдельный массив
	        array_push($item, iconv('utf-8', 'cp1251', $cell->getCalculatedValue()));
	      }
	      //заносим массив со значениями ячеек отдельной строки в "общий массв строк"
	      array_push($array, $item);
	    }

	    return $array;
  	}
}