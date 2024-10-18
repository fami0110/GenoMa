<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenoMa - User Recommendation</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; margin-top: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <!-- Header -->
        <div style="text-align: center; padding: 20px; border-bottom: 2px solid #eee;">
            <h1 style="color: #333333; margin: 0; font-size: 24px;">GenoMa</h1>
            <p style="color: #666666; margin-top: 5px;">User Recommendation</p>
        </div>

        <!-- Content -->
        <div style="padding: 20px;">
            <div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                <h2 style="color: #444444; margin: 0; font-size: 18px;">From: {{ $mailData['email'] }}</h2>
            </div>

            <div style="background-color: #ffffff; padding: 15px; border: 1px solid #e9ecef; border-radius: 4px;">
                <p style="color: #555555; margin: 0;">{{ $mailData['message'] }}</p>
            </div>
        </div>

        <!-- Footer -->
        <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 2px solid #eee;">
            <p style="color: #999999; font-size: 14px; margin: 0;">© 2024 GenoMa. All rights reserved.</p>
        </div>
    </div>
</body>
</html>