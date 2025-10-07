<?php 

$emailBody = '<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>2FA OTP Email Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body style="margin: 0; padding: 0;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="90%"
        style="border-collapse: collapse; border: 30px solid #e7e7e7;">
        <tbody style="padding:0px 30px; display: block;">
            <tr>
                <td style="padding: 56px 0 24px 26px;">
                    <img src="https://LearnVault Educations.online/user/assets/" style="height: 30px;">
                </td>
            </tr>
            <tr>
                <td height="42"
                    style="padding: 10px 0 4px 24px; color: #000000; font-family: Honeywell Sans Web; font-weight: 800; font-size: 26px;">
                    <b>Hi '.$first.'!</b>
                </td>
            </tr>
            <tr>
                <td
                    style="padding:1px 24px 22px; color:#606060; font-size:14px; font-family: HoneywellSansWeb-Medium, Arial; line-height: 1.5;">
                   We have received your withdrawal request from your LearnVaults 
                   save account to your wallet address '. $walletaddress.'<br />
                </td>

            </tr>
            <tr>
                <td
                    style="padding:1px 24px 22px; color:#606060; font-size:14px; font-weight: 800; font-family: HoneywellSansWeb-Medium, Arial; line-height: 1.5;">
                   Withdrawal Amount</td>
            </tr>
            <tr>
                <td style="padding: 0px 25px;">
                    <table border="0" cellpadding="0" cellspacing="0" align="center" style="background-color: #FFF9E9; text-align: center; font-size: 30px; font-family: HoneywellSansWeb-Medium, Arial; font-weight: bold; padding: 30px 0; width: 100%;" >
                        <tr>
                            <td>£'.number_format($depamount,2).'
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td
                    style="padding:18px 0px 50px 25px; color:#606060; font-size:14px; font-family: HoneywellSansWeb-Medium, Arial; line-height: 20px;  text-align: left;">
                    Need help? Contact Customer support. <br>
                    Toll Free No. ##CustomerSupportContact## or<br>
                    email us at <a href="mailto:support@LearnVault Educations.online"
                        style="color:#0889c4; font-family: HoneywellSansWeb-Medium, Arial, Helvetica, sans-serif; text-decoration:none">##SupportEmail##</a>
                    <br><br>

                </td>
            </tr>
        </tbody>
        <tr>
            <td
                style="padding:28px 0 0; color: #606060; font-family: HoneywellSansWeb-Medium, Arial; font-size: 12px; background-color: #e7e7e7;">
                &copy; LearnVaultsr. All Rights Reserved<br><br>
                The content of this message, together with any attachments, are intended only for the use of the
                person(s) to which they are addressed and may contain confidential and/or privileged information.
                Further, any information herein is confidential and protected by law. It is unlawful for unauthorized
                persons to use, review, copy, disclose, or disseminate confidential information. If you are not the
                intended recipient, immediately advise the sender and delete this message and any attachments. Any
                distribution, or copying of this message, or any attachment, is prohibited.
            </td>
        </tr>
    </table>
</body>
</html>';

?>