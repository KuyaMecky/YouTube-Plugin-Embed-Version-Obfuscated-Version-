# YouTube Plugin Embed Version (Obfuscated Version)

## Author
Michael Tallada

## Description
This plugin allows you to easily embed YouTube videos into your WordPress site. It provides a simple and efficient way to add video content to your posts and pages.

## Features
- Easy embedding of YouTube videos
- Customizable video player options
- Responsive design for mobile and desktop

## Installation

1. **Download the Plugin**
    - Download the plugin zip file from the repository.

2. **Upload the Plugin to WordPress**
    - Go to your WordPress dashboard.
    - Navigate to `Plugins` > `Add New`.
    - Click on the `Upload Plugin` button.
    - Choose the downloaded zip file and click `Install Now`.

3. **Activate the Plugin**
    - After the installation is complete, click on the `Activate Plugin` button.

## Setup

1. **Configure Plugin Settings**
    - Go to `Settings` > `YouTube Plugin Embed`.
    - Configure the settings according to your preferences, such as default video size, autoplay options, and more.

2. **Embed YouTube Videos**
    - Edit the post or page where you want to embed a YouTube video.
    - Use the shortcode `[youtube]` with the video URL to embed the video. For example:
      ```
      [youtube]https://www.youtube.com/watch?v=example[/youtube]
      ```

## Support
For any issues or questions, please contact Michael Tallada at [tallada88@gmail.com](mailto:KuyaMecky).

## License
This plugin is licensed under the MIT License.

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