# Hypothesis Plugin

The **Hypothesis** Plugin is for [Grav CMS](http://github.com/getgrav/grav) and displays the [Hypothesis](https://hypothes.is/) sidebar on your Grav site.

## Installation

Installing the Hypothesis plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install hypothesis

This will install the Hypothesis plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/hypothesis`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `hypothesis`. You can find these files on [GitHub](https://github.com/paul-hibbitts/grav-plugin-hypothesis) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/hypothesis

> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/hypothesis/hypothesis.yaml` to `user/config/plugins/hypothesis.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

## Page Options
Once the plugin is installed, Grav pages will support the following Page Header/FrontMatter option:

```
hide_hypothesis: true    # hide Hypothesis sidebar on this page
```
