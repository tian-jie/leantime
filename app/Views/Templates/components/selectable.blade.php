@dispatchEvent('beforeSelectable')

<div {{ $attributes->merge([ 'class' => 'selectable selectable-'.$name.' tw-center '.($selected == "true" ? 'active' : '') ]) }} id="selectableWrapper-{{ $id }}">

        <div class="selectableContent">
            {{ $slot }}
        </div>

        <input type="radio"  name="{{ $name }}" {!!  $selected == "true" ? "checked='checked'" : ""  !!} id="selectable-{{ $id }}" value="{{ $value }}" class="selectableRadio tw-hidden"/>
        <label for="selectable-{{ $id }}" class="selectable-label" >
            {{ $label }}
        </label>

</div>

@pushonce('scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery(".selectable").each(function(){
                jQuery(this).click(function(){
                    var name = jQuery(this).find("input").attr("name");
                    jQuery(".selectable-"+name).find("input.selectableRadio").removeProp("checked");
                    jQuery(".selectable-"+name).removeClass("active");
                    jQuery(this).addClass("active");
                    jQuery(this).find("input.selectableRadio").prop("checked", true);
                });
            });

        })
    </script>
@endpushonce

@dispatchEvent('afterSelectableClose')
