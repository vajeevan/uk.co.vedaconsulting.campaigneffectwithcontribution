{crmAPI var='result' entity='Contribution' action='get' sequential=1 campaign_id=$smarty.get.id}

<p>
<a href="{crmURL p="civicrm/contribute/search" q="_qf_Search_display=true&contribution_campaign_id=`$smarty.get.id`"}"> {$result.count} Contributions will effect <a/>
</p> 
