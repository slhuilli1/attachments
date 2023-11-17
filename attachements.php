<?php
	defined('_JEXEC') or die('Access deny');

	class plgContentattachements extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){	
				$nomtable = "newjoomla";
				
			$sql = "SELECT ".$nomtable."_fields_values.value, ".$nomtable."_content.id, ".$nomtable."_content.title 
					FROM ".$nomtable."_fields, ".$nomtable."_fields_values,".$nomtable."_content 
					WHERE ".$nomtable."_fields.id = ".$nomtable."_fields_values.field_id
					AND ".$nomtable."_fields.id = 4 
					AND ".$nomtable."_fields_values.item_id=".$nomtable."_content.id ORDER BY ".$nomtable."_content.id";
					
			$db = JFactory::getDBO();
			$db->setQuery($sql);			
			$nb=0;	
			$ch = '<div class="liste-attachements">\r\n';
			foreach($db->loadObjectList() as $A)
			{
				$ch .= '<div class="lien"><a href="'.$A->value.'" target="_blank">'.$A->title.' (Article n° '.$A->id.')</a>';
			}
			$ch .= '<div>\r\n';
		}	
	}