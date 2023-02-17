## Description

The Active Login Users plugin is a powerful tool for displaying all users and currently logged-in users on your website, making it easy for site administrators and visitors to see who's online and active. This plugin can be used in various contexts, such as pages, posts, widgets, or custom templates.

## Features
The plugin has several features that make it an exceptional tool for tracking active users:

* Real-time tracking: The plugin monitors user activity and updates the list of active users in real-time, without requiring a page refresh.
* Customizable display: The plugin allows you to customize the display of the active users list using various settings, including the number of users to show, the order of display, and the fields to show (such as user avatar, name, and role).
* User roles filtering: You can choose which user roles to show in the active users list, so you can filter out non-essential or inactive users.
* Shortcode support: The plugin includes a shortcode that can be used to display the active users list in any post, page, or custom template, making it easy to integrate with your website's design.

## Installation
To install the Active Login Users plugin, follow these steps:

1. Upload the plugin files to the `/wp-content/plugins/active-login-users` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Configure the plugin settings in the 'Active Login Users' screen under 'Settings'.

## Usage
To display the active users list in your website, use the `[active_users]` shortcode in any post, page, or custom template. The shortcode supports various attributes that allow you to customize the display, such as:

* activeusers: The active users to display in the login active users lists (default: no)
* column: Column is set how item you show one column (default: 3)
* roles: The user roles to display in the list (default: all).
* number: The number of users to show in the list (default: 10).
* orderby: The field to use for sorting the list (default: login time).
* order: The sorting order (default: DESC).
* avatar: Whether to show user avatars (default: true).
* name: Whether to show user names (default: true).
* time: Whether to show the login time (default: true).

For example, to show the five most recent logged-in subscribers without avatars, use the following shortcode:

`[active_login_users activeusers=yes column=3 roles=subscriber number=5 orderby=login_time order=DESC avatar=false name=true time=true]`

## Support
If you encounter any issues or have any feature requests, please feel free to [create a new issue on Github](https://github.com/sumanengbd/active-login-users).

## Frequently asked questions
<details>
<summary>I found a bug. Where should I post it?<summary>

Please use the issues section in the [GitHub-Repository](https://github.com/sumanengbd/active-login-users/issues).

I will most likely not maintain the forum support forum on wordpress.org. Anyway, other users might have an answer for you, so it's worth a shot.
</details>

<details>
<summary>I'd like to suggest a feature. Where should I post it?<summary>

Please post an issue in the [GitHub-Repository](https://github.com/sumanengbd/active-login-users/issues)
</details>

## Screenshots
1. All Users Card Lists.
2. Active Login Users Card Lists.