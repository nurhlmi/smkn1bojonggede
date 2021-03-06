<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  User.terms
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;

FormHelper::loadFieldClass('radio');

/**
 * Provides input for privacyterms
 *
 * @since  3.9.0
 */
class JFormFieldterms extends JFormFieldRadio
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  3.9.0
	 */
	protected $type = 'terms';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string   The field input markup.
	 *
	 * @since   3.9.0
	 */
	protected function getInput()
	{
		// Display the message before the field
		echo $this->getRenderer('plugins.user.terms.message')->render($this->getLayoutData());

		return parent::getInput();
	}

	/**
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
	 *
	 * @since   3.9.0
	 */
	protected function getLabel()
	{
		if ($this->hidden)
		{
			return '';
		}

		return $this->getRenderer('plugins.user.terms.label')->render($this->getLayoutData());
	}

	/**
	 * Method to get the data to be passed to the layout for rendering.
	 *
	 * @return  array
	 *
	 * @since   3.9.4
	 */
	protected function getLayoutData()
	{
		$data = parent::getLayoutData();

		$article = false;
		$termsArticle = $this->element['article'] > 0 ? (int) $this->element['article'] : 0;

		if ($termsArticle && Factory::getApplication()->isClient('site'))
		{
			$db    = Factory::getDbo();
			$query = $db->getQuery(true)
				->select($db->quoteName(array('id', 'alias', 'catid', 'language')))
				->from($db->quoteName('#__content'))
				->where($db->quoteName('id') . ' = ' . (int) $termsArticle);
			$db->setQuery($query);
			$article = $db->loadObject();

			JLoader::register('ContentHelperRoute', JPATH_BASE . '/components/com_content/helpers/route.php');

			if (Associations::isEnabled())
			{
				$termsAssociated = Associations::getAssociations('com_content', '#__content', 'com_content.item', $termsArticle);
			}

			$currentLang = Factory::getLanguage()->getTag();

			if (isset($termsAssociated) && $currentLang !== $article->language && array_key_exists($currentLang, $termsAssociated))
			{
				$article->link = ContentHelperRoute::getArticleRoute(
					$termsAssociated[$currentLang]->id,
					$termsAssociated[$currentLang]->catid,
					$termsAssociated[$currentLang]->language
				);
			}
			else
			{
				$slug = $article->alias ? ($article->id . ':' . $article->alias) : $article->id;
				$article->link = ContentHelperRoute::getArticleRoute($slug, $article->catid, $article->language);
			}
		}

		$extraData = array(
			'termsnote' => !empty($this->element['note']) ? $this->element['note'] : Text::_('PLG_USER_TERMS_NOTE_FIELD_DEFAULT'),
			'options' => $this->getOptions(),
			'value'   => (string) $this->value,
			'translateLabel' => $this->translateLabel,
			'translateDescription' => $this->translateDescription,
			'translateHint' => $this->translateHint,
			'termsArticle' => $termsArticle,
			'article' => $article,
		);

		return array_merge($data, $extraData);
	}
}
