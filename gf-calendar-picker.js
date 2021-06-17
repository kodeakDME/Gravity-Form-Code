
// Gravity forms js to limit the calendar to only future days an excluding weekends. Add this <script> in an HTML field on the form where you want to set this. Change the formID and fieldId appropriately. 

gform.addFilter( 'gform_datepicker_options_pre_init', function( optionsObj, formId, fieldId ) {
    if ( formId == 2 && fieldId == 4 ) {
        optionsObj.firstDay = 0;
        optionsObj.minDate = 0;
        optionsObj.beforeShowDay = jQuery.datepicker.noWeekends;
    }
    return optionsObj;
});

