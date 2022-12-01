<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Result');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Result</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="19%" align="center">Name</th>
                            <th width="25%" align="center">Subject</th>
                            <th width="13%" align="center">Class</th>
                            <th width="19%" align="center">Coin</th>
                            <th width="10%" align="center">Total</th>
                        </tr>';
            foreach ($assessment as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['subject'].'</td>
                            <td>'.$row['class'].'</td>
                            <td>'.$row['coin'].'</td>
                            <td>'.$row['total'].'</td>
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('result.pdf', 'I');
?>