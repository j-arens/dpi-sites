<?php

// prevent direct access
if ( !defined( 'ABSPATH' ) ) exit;

class DPI_PPF_Email {

    private $recipients;
    private $mailFromName;
    private $mailFromDomain;

    public function setRecipients($arr) {
        if (gettype($arr) === 'array') {
            $this->recipients = $arr;
        } else {
            throw new Exception('DPI_PPF_EMAIL: setRecipients expects an array. You passed a(n)' . gettype($arr) . '.');
            return false;
        }
    }

    public function setMailFromName($str) {
        if (gettype($str) === 'string') {
            $this->mailFromName = $str;
        } else {
            throw new Exception('DPI_PPF_MAIL: setMailFromName expects a string. You passed a(n)' . gettype($str) . '.');
            return false;
        }
    }

    public function setFromDomain($str) {
        if (gettype($str) === 'string') {
            $this->mailFromDomain = $str;
        } else {
            throw new Exception('DPI_PPF_MAIL: setFromDomain expects a string. You passed a(n)' . gettype($str) . '.');
            return false;
        }
    }

    public function getMailFromName() {
        return $this->mailFromName;
    }

    public function getFromDomain() {
        return $this->mailFromDomain;
    }

    public function runSetup() {
        if (count(array_filter(get_object_vars($this))) === 3) {
            add_filter('wp_mail_from', [$this, 'getFromDomain']);
            add_filter('wp_mail_from_name', [$this, 'getMailFromName']);
            add_filter('wp_mail_content_type', function($type) {return 'text/html';});
        } else {
            throw new Exception('DPI_PPF_EMAIL: You must set the receipients, mailFromName, and mailFromDomain properties before calling runSetup.');
            return false;
        }
    }

    public function sendMail($formValues) {
        foreach($this->recipients as $recipient) {
            wp_mail($recipient, 'New Online Donation', $this->_generateTemplate($formValues));
        }
    }

    private function _generatePersonNotify($people) {
        $markup = '';

        if (!empty($people)) {
            $counter = 1;
            $markup = '<p style="font-family:sans-serif;font-size:18px;font-weight:normal;margin:0;Margin-bottom:8px;">Please notify the following person(s) of my gift:</p>';
            
            foreach($people as $person) {
                $markup .= '
                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:8px;">
                        Person ' . $counter . '
                        <br />
                        name: ' . $person['name'] . '
                        <br />
                        street: ' . $person['address'] . '
                        <br />
                        city: ' . $person['city'] . '
                        <br />
                        state: ' . $person['state'] . '
                        <br />
                        zip code: ' . $person['zipCode'] . '
                    </p>
                ';
                $counter++;
            }
        }

        return $markup;
    }

    private function _generateTemplate($formValues) {
        return '
            <!DOCTYPE html>
            <html>
                <head>
                    <meta name="viewport" content="width=device-width">
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <title>New Online Donation</title>
                    <style type="text/css">
                        @media only screen and (max-width: 620px) {
                        table[class=body] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important; }
                        table[class=body] p,
                        table[class=body] ul,
                        table[class=body] ol,
                        table[class=body] td,
                        table[class=body] span,
                        table[class=body] a {
                            font-size: 16px !important; }
                        table[class=body] .wrapper,
                        table[class=body] .article {
                            padding: 10px !important; }
                        table[class=body] .content {
                            padding: 0 !important; }
                        table[class=body] .container {
                            padding: 0 !important;
                            width: 100% !important; }
                        table[class=body] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important; }
                        table[class=body] .btn table {
                            width: 100% !important; }
                        table[class=body] .btn a {
                            width: 100% !important; }
                        table[class=body] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important; }}
                        @media all {
                        .ExternalClass {
                            width: 100%; }
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%; }
                        .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important; }
                        .btn-primary table td:hover {
                            background-color: #34495e !important; }
                        .btn-primary a:hover {
                            background-color: #34495e !important;
                            border-color: #34495e !important; } }
                    </style>
                </head>
                <body class="" style="background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#f6f6f6;width:100%;">
                        <tr>
                            <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                            <td class="container" style="font-family:sans-serif;font-size:14px;vertical-align:top;display:block;max-width:960px;padding:10px;width:100%;Margin:0 auto !important;">
                            <div class="content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:100%;padding:10px;">
                            <span class="preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0;">New Donation Form Submission</span>
                            <table class="main" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:#fff;border-radius:3px;width:100%;">
                                <tr>
                                    <td class="wrapper" style="font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                                            <tr>
                                                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">
                                                    <p style="font-family:sans-serif;font-size:24px;font-weight:normal;margin:0;Margin-bottom:24px;">Hooray, you\'ve received a new online donation!</p>
                                                    <p style="font-family:sans-serif;font-size:18px;font-weight:normal;margin:0;Margin-bottom:8px;">Donation details:</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">Donation Amount: $' . $formValues['1']['donationAmount'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">Fund: ' . $formValues['1']['fund'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Gift made in honor/memory of: ' . $formValues['1']['giftHonor'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:18px;font-weight:normal;margin:0;Margin-bottom:8px;">Other Options:</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">I prefer that my name not appear on a list of contributors: ' . ($formValues['3']['addToContributors'] == 'on' ? 'Do not add me to a list of contributors' : 'Add me to a list of contributors') . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">I would like more information about Planned Giving/establishing a fund: ' . ($formValues['3']['moreInfo'] == 'on' ? 'I would like more information' : 'No thanks, I do not want more information' ) . '</p>
                                                    <p style="font-family:sans-serif;font-size:18px;font-weight:normal;margin:0;Margin-bottom:8px;">Contact details:</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">Full Name: ' . $formValues['1']['fullName'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">Phone Number: ' . $formValues['1']['phone'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">Email Address: ' . $formValues['1']['email'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">Address: ' . $formValues['1']['address'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">City: ' . $formValues['1']['city'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">State: ' . $formValues['1']['state'] . '</p>
                                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">ZIP Code: ' . $formValues['1']['zipCode'] . '</p>
                                                    ' . $this->_generatePersonNotify($formValues['2']) . '
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                    </tr>
                    </table>
                </body>
            </html>
        ';
    }
}