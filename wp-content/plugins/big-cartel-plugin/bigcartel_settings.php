<?php /*
Copyright (C) 2011 by  Matt Anderson, Tonka Park

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
*/
?>

<style type="text/css" media="screen">
.wrap {width: 600px;}
form ol {list-style: none;margin: 0 0 1em 0;}
form ol li {list-style-position: outside;margin: 0 0 2em 0;}
li {line-height: 1.4;}
fieldset {background: #F1F1F1;border: 1px solid #E3E3E3;margin: 0 0 1.5em 0;padding: 1.5em 1.5em 1em 1.5em;}
fieldset.buttons {background: inherit;border: 0;padding: 0;}
.inputs label {display: block;}
input[type="text"] {font-size: inherit; padding: 3px 2px;width: 300px;}
p.inline-hints {color: #666;font-size: 0.8em;margin-bottom: 0.25em;margin-top: 0.25em;}

#usage .bc_code {margin-left: 20px; font-family: Consolas, Monaco, Courier, monospace;}
</style>

<div class="wrap">
  <h2>Big Cartel Plugin by Tonka Park</h2>
  <form method="post" action="options.php">
  <?php settings_fields( 'bc-settings-group' ); ?>
  <fieldset class="inputs">
    <ol>
      <li>
        <label>Big Cartel Subdomain</label>
        <input type="text" name="bc_subdomain" value="<?php echo get_option('bc_subdomain'); ?>" size="20" />
        <p class="inline-hints">http://{subdomain}.bigcartel.com </p>
      </li>
      <li>
        <label>Store URL</label>
        <input type="text" name="bc_shop_url" value="<?php echo get_option('bc_shop_url'); ?>" size="60" />
        <p class="inline-hints">http://store.yourdomain.com - This will be used to link to your store.</p>
      </li>
    </ol>
  </fieldset>

  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="bc_subdomain,bc_shop_url" />

  <fieldset class="buttons">
    <ol>
      <li>
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </li>
    </ol>
  </fieldset>
  </form>
  
  <div id="usage">
    <h2>Usage</h2>
    <h3>Big Cartel Product Shortcode</h3>
    <p>To embed a product image in a post, page or widget use the following code:</p>
    <p class="bc_code">[bc_product permalink='your-product']<br/>
    [bc_product permalink='your-product' size='small']<br/>
    [bc_product permalink='your-product' size='medium']<br/>
    [bc_product permalink='your-product' size='large']</p>
    <h3>Alternate Store Shortcode</h3>
    <p>If you want to link to a secondary store that is not your primary store settings you can use the subdomain attribute in the shortcode.</p>
    <p class="bc_code">
    [bc_product permalink='black-and-white' subdomain='tonkapark']<br/>
    [bc_product permalink='end-of-summer' size='large' subdomain='tonkapark']
    </p>
    
    <h3>How to find your product permalink:</h3>
    <p>Typically your product permalink is your product title with hyphens in place of the spaces. Browse to the product you want to embed and grab the last portion of the url.</p>
    <p>If your product is at http://subdomain.bigcartel.com/product/your-best-product, you would use 'your-best-product' in your shortcode.</p>
    
    <h3>Big Cartel Product link widget</h3>
    <p>The Big Cartel Plugin includes a widget that will display 10 products from your shop. You can also change the number of products displayed as needed. Just head over to the widgets section to add it to your sidebar.</p>
    
    <h3>Need More Help?</h3>
    <p>Visit <a href="http://tonkapark.com" target="_blank">TonkaPark.com</a> for more help with Wordpress and Big Cartel.</p>
    <p>Support this project by <a href="http://themes.tonkapark.com" target="_blank">purchasing a Big Cartel Theme</a></p>
  </div>
</div>