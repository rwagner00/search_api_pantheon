<?php

namespace Drupal\search_api_pantheon_admin\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\search_api\ServerInterface;
use Drupal\search_api_pantheon\Services\SchemaPoster;
use Drupal\search_api_pantheon\Utility\Cores;
use Drupal\search_api_pantheon\Utility\SolrGuzzle;
use Drupal\search_api_solr\Controller\SolrConfigSetController;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * The Solr admin form.
 *
 * @package Drupal\search_api_pantheon\Form
 */
class PostSolrSchema extends FormBase
{

  /**
   * SolrAdminForm constructor.
   */
  public function __construct()
  {
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container)
  {
    return new static();
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'search_api_solr_admin_post_schema';
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   * @throws \JsonException
   */
  public function buildForm(array $form, FormStateInterface $form_state, ServerInterface $search_api_server = null)
  {
    $schema_poster = \Drupal::service('search_api_pantheon.schema_poster');
    $messages = $schema_poster->postSchema($search_api_server->id());
    $form['results'] = [
      '#markup' => join('<br>', $messages),
    ];
    return $form;
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    parent::validateForm($form, $form_state); // TODO: Change the autogenerated stub
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @throws \Exception
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    return $form;
  }

}
