<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiSaku - Notifikasi</title>
</head>

<body
    style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f5f5; color: #333333;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td style="padding: 30px 0;">
                <table role="presentation"
                    style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);"
                    width="100%" cellspacing="0" cellpadding="0" border="0">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 30px 40px 20px; text-align: center; border-bottom: 1px solid #edf2f7;">
                            <h1 style="margin: 0; font-size: 28px; font-weight: 700; color: #0d9488;">
                                <span style="color: #0d9488;">Si</span><span style="color: #0f766e;">Saku</span>
                            </h1>
                        </td>
                    </tr>

                    <!-- Main Content -->
                    <tr>
                        <td style="padding: 40px 40px 20px;">
                            <h2 style="margin: 0 0 20px; font-size: 22px; font-weight: 600; color: #1f2937;">
                                {{ $notification->header }}
                            </h2>

                            <p style="margin: 0 0 24px; font-size: 16px; line-height: 24px; color: #4b5563;">
                                Anda menerima pesan terjadwal dari SiSaku:
                            </p>

                            <div
                                style="background-color: #f8fafc; border-radius: 12px; padding: 24px; margin: 0 auto 32px;">
                                <div style="color: #1e293b; font-size: 16px; line-height: 24px;">
                                    {!! nl2br(e($notification->message)) !!}
                                </div>
                            </div>

                            <p style="margin: 0 0 32px; font-size: 14px; line-height: 22px; color: #6b7280;">
                                Pesan ini dikirim pada: {{ $notification->sent_at }} | Jika ingin melihat lebih detail
                                check halaman notifikasi
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 0 40px 40px;">
                            <div style="border-top: 1px solid #edf2f7; padding-top: 20px; text-align: center;">
                                <p style="margin: 0 0 12px; font-size: 13px; color: #6b7280;">
                                    Email ini dikirim secara terjadwal, mohon jangan membalas email ini.
                                </p>
                                <p style="margin: 0; font-size: 13px; color: #6b7280;">
                                    &copy; 2025 SiSaku. Seluruh hak cipta dilindungi.
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
