<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Theme;

/**
 * Class HypothesisPlugin
 * @package Grav\Plugin
 */
class HypothesisPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
            'onGetPageTemplates' => ['onGetPageTemplates', 0]
        ];
    }

    public function onGetPageTemplates($event)
    {
      $types = $event->types;
      $locator = $this->grav['locator'];
      $types->scanBlueprints($locator->findResource('plugin://' . $this->name . '/blueprints'));
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main event we are interested in
        $this->enable([
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ]);
    }

    /**
     * Do some work for this event, full details of events can be found
     * on the learn site: http://learn.getgrav.org/plugins/event-hooks
     */
    public function onTwigSiteVariables()
    {
        $page = $this->grav['page'];
        // Guard against no resolved page
        if (!$page) {
            return;
        }
        $header = $page->header();

        if ($this->grav['page']->template() == 'presentation' or $this->grav['page']->template() == 'slide') {
          return;
        }

        if (isset($header->hide_hypothesis)) {
          $excludes = $header->hide_hypothesis;
          if ($excludes)
          return;
        }

        // Add the Hypothesis embed script as an asset (avoids Markdown escaping raw HTML)
        $this->grav['assets']->addJs('https://hypothes.is/embed.js', ['loading' => 'defer', 'group' => 'bottom']);
    }
}