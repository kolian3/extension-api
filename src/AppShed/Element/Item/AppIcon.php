<?php

namespace AppShed\Element\Item;

class AppIcon extends Icon {
    
    const HTML_TAG = 'div';
    
    protected $innerClass;

    public function getInnerClass() {
        return $this->innerClass;
    }

    public function setInnerClass($innerClass) {
        $this->innerClass = $innerClass;
    }

    /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
	 */
    protected function getHTMLNodeInner($node, $xml, $settings) {
        $node->setAttribute('data-no-glow', 'no-glow');
        $node->appendChild($inner = $xml->createElement('div', 'item-icon-inner'));
		$inner->appendChild($icon = $xml->createElement('div', 'app-icon' . (empty($this->innerClass) ? '' : ' ' . $this->innerClass)));
		$icon->appendChild($xml->createElement('div', array( 'class'=>'image', 'style' => $this->icon ? 'background-image:url(\''.$this->icon->getUrl().'\')' : '')));
		$icon->appendChild($xml->createElement('div', array( 'class'=>'background')));
		$this->applyLinkToNode($xml, $icon, $settings);
		$inner->appendChild($xml->createElement('div', array('class' => 'title', 'text' => $this->title)));
    }
}
