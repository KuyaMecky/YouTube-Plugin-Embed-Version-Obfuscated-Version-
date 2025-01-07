# Changelog v1.6.0

## Multiple Channel Management:

- Admins can add multiple YouTube channels
- Each channel can have its own name, ID, and filter settings
- Channels can be added or removed dynamically

## Enhanced Settings:

- **Channel Name**: For easy identification
- **Channel ID**: YouTube channel identifier
- **Title Filter**: Keywords to filter broadcasts
- **Broadcast Times**: Customizable schedule for each channel

## Improved Frontend:

- Widget now allows selection of specific channels
- Shortcode supports channel parameter: `[youtube_live channel="0"]`
- Better broadcast filtering based on title and time

## To use the enhanced features:

1. Install the plugin as before
2. Go to "YouTube Live Broadcasts" in the WordPress admin menu
3. Add channels and configure their settings:
    - Enter channel name and ID
    - Set title filters (e.g., "LOTTERY LIVE")
    - Set broadcast times in 24-hour format (e.g., "13:00,18:00,20:00")

4. Use the widget or shortcode to display specific channels

### Example shortcode usage:

```php
[youtube_live channel="0"]  // Shows first channel
[youtube_live channel="1"]  // Shows second channel
```

The settings are stored in the WordPress options table for persistence and can be easily modified through the admin interface.