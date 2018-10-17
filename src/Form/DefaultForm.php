<?php

namespace Drupal\example_d8\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\example_d8\DefaultService;

/**
 * Class DefaultForm.
 */
class DefaultForm extends FormBase {
  
  protected $defaultService;
  
  /**
   * {@inheritdoc}
   */
  public function __construct(DefaultService $defaultService) {
    $this->defaultService = $defaultService;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('example_d8.default')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['odd_numbers'] = [
      '#type' => 'number',
      '#title' => $this->t('Odd Numbers'),
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  
    drupal_set_message("My Odd numbers " . implode(',', $this->defaultService->generateOddNumbers($form_state->getValue('odd_numbers'))));

  }
}
