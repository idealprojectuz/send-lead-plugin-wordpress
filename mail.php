<?php
function generateHtml($table, $submissiondata)
{
    return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your login</title>

    <style type="text/css">
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ed4a68;
            color: white;
        }
    </style>
</head>

<body style="font-family: Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; background-color: #ffffff;">
    <table role="presentation"
        style="width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; font-family: Arial, Helvetica, sans-serif; background-color: rgb(239, 239, 239);">
        <tbody>
            <tr>
                <td align="center" style="padding: 1rem 2rem; vertical-align: top; width: 100%;">
                    <table role="presentation"
                        style="max-width: 600px; width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; text-align: left;">
                        <tbody>
                            <tr>
                                <td style="padding: 40px 0px 0px;">
                                    <div style="text-align: left;">
                                        <div style="padding-bottom: 20px;"><img src="https://i.ibb.co/Qbnj4mz/logo.png"
                                                alt="Company" style="width: 56px;"></div>
                                    </div>
                                    <div style="padding: 20px; background-color: rgb(255, 255, 255);">
                                        <div style="color: rgb(0, 0, 0); text-align: left;">
                                            <h1 style="margin: 1rem 0">Client Information</h1>
                                            ' . $table . '

                                            <h1 style="margin: 1rem 0">Selected services</h1>
                                            ' . $submissiondata . '
                                            <!-- <p style="padding-bottom: 16px"><strong
                                                    style="font-size: 130%">${code}</strong></p> -->
                                            <!-- <p style="padding-bottom: 16px">Agar siz buni soʻramagan boʻlsangiz, bu
                                                xatni eʼtiborsiz qoldirishingiz mumkin.</p> -->
                                            <p style="padding-bottom: 16px">thank you,<br>idealproject.uz team</p>
                                        </div>
                                    </div>
                                    
                                </td>
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
}
