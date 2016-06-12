<script type="text/javascript" src="list-group.js"></script>
<link rel="stylesheet" type="text/css" href="style.css"/>

<div class="container" style="margin-top:20px;">
	<div class="row">
        <div class="col-xs-6">
            <h3 class="text-center">Basic Example</h3>
            <div class="well" style="max-height: 300px;overflow: auto;">
        		<ul class="list-group checked-list-box">
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item" data-checked="true">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Morbi leo risus</li>
                  <li class="list-group-item">Porta ac consectetur ac</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Morbi leo risus</li>
                  <li class="list-group-item">Porta ac consectetur ac</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
        <div class="col-xs-6">
            <h3 class="text-center">Colorful Example</h3>
            <div class="well" style="max-height: 300px;overflow: auto;">
            	<ul id="check-list-box" class="list-group checked-list-box">
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item" data-color="success">Dapibus ac facilisis in</li>
                  <li class="list-group-item" data-color="info">Morbi leo risus</li>
                  <li class="list-group-item" data-color="warning">Porta ac consectetur ac</li>
                  <li class="list-group-item" data-color="danger">Vestibulum at eros</li>
                </ul>
                <br />
                <button class="btn btn-primary col-xs-12" id="get-checked-data">Get Checked Data</button>
            </div>
            <pre id="display-json"></pre>
        </div>
	</div>
    <div class="row">
        <div class="col-xs-6">
            <h3 class="text-center">Using Button Style's</h3>
            <div class="well" style="max-height: 300px;overflow: auto;">
        		<ul class="list-group checked-list-box">
                  <li class="list-group-item" data-style="button">Cras justo odio</li>
                  <li class="list-group-item" data-style="button" data-color="success">Dapibus ac facilisis in</li>
                  <li class="list-group-item" data-style="button" data-color="info">Morbi leo risus</li>
                  <li class="list-group-item" data-style="button" data-color="warning">Porta ac consectetur ac</li>
                  <li class="list-group-item" data-style="button" data-color="danger">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
        <div class="col-xs-6">
            <h3 class="text-center">Just a Small Party</h3>
            <div class="well" style="max-height: 300px;overflow: auto;">
            	<ul class="list-group checked-list-box">
                  <li class="list-group-item" data-style="button">Cras justo odio</li>
                  <li class="list-group-item" data-color="success">Dapibus ac facilisis in</li>
                  <li class="list-group-item" data-style="button" data-color="info">Morbi leo risus</li>
                  <li class="list-group-item" data-color="warning">Porta ac consectetur ac</li>
                  <li class="list-group-item" data-style="button" data-color="danger">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
(function($) { 
    var snippetSaved = false;
    var htmleditor = ace.edit("editor-html");
    var jseditor = ace.edit("editor-js");
    var csseditor = ace.edit("editor-css");
    var version = '3.1.0';
    var snippetTitle = $('#snippet-name');

    $('select[name="bootstrap-version"]').change(function(e)
    {
        version = $(this).val();
        $('#show-preview').click();
    });

    function setEditorOptions(editor, type){
        editor.setTheme("ace/theme/clouds");
        editor.setHighlightActiveLine(false);
        editor.getSession().setMode("ace/mode/"+type);
        editor.commands.addCommand({
            name: 'save',
            bindKey: {win: 'Ctrl-S',  mac: 'Command-S'},
            exec: function(editor) {
                $('#save-snippet').click();
            },
            readOnly: false
        });
        editor.commands.addCommand({
            name: 'evaluate',
            bindKey: {win: 'Ctrl-Return',  mac: 'Command-Return'},
            exec: function(editor) {
                $('#show-preview').click();
            },
              readOnly: true
        });
    };

    setEditorOptions(htmleditor,'html');
    setEditorOptions(jseditor,'javascript');
    setEditorOptions(csseditor,'css');

    $('#show-html').click(function(e){
        e.preventDefault();
        markActive(this);
        $('#editor-html').show().siblings().hide();
        $('#preview-container').hide();
        htmleditor.resize();
        htmleditor.focus();
    });

    $('#show-js').click(function(e){
        e.preventDefault();
        markActive(this);
        $('#editor-js').show().siblings().hide();
        $('#preview-container').hide();

        jseditor.resize();
        jseditor.focus();
    });

    $('#show-css').click(function(e){
        e.preventDefault();
        markActive(this);
        $('#editor-css').show().siblings().hide();
        $('#preview-container').hide();

        csseditor.resize();
        csseditor.focus();
    });

    $('#save-snippet').click(function(e){
        e.preventDefault();
        var l = Ladda.create(this);
        l.start();
        $.post("http://bootsnipp.com/user/snippets/qgqbR", 
            { "html": htmleditor.getValue() ,
              "css": csseditor.getValue() ,
              "js": jseditor.getValue(),
              "title" : $('input[name="title"]').val(),
              "version" : version
          },

          function(data){
            if (data.response != 'ok'){
                alert('There was an error while trying to save the snippet, please try again');
            } else {
                snippetSaved = true;
                $('#snippet-name').text($('input[name="title"]').val());
                console.log('snippet saved');
            }

          }, "json")
        .fail(function(jqXHR, textStatus, errorThrown) { 
            var messageBag = jQuery.parseJSON(jqXHR.responseText);
            alert(messageBag.response);
        })
        .always(function() { 
            l.stop();
        });
        return false;
    });

    $('#show-preview').click(function(e){
        e.preventDefault();

        markActive(this);

        $('.playground-editor').hide();

        var html = buildSource(htmleditor, jseditor, csseditor);
        var iframe = document.createElement('iframe');
        
        iframe.src = 'about:blank';
        iframe.frameBorder="0";
        iframe.height = 496;
        iframe.className = 'preview-iframe';
        
        $('.preview-iframe').remove();
        $('div#preview-container').append(iframe);
        
        iframe.contentWindow.document.open('text/html', 'replace');
        iframe.contentWindow.document.write(html);
        iframe.contentWindow.document.close();

        $('#preview-container').show();
    });

    function markActive(el)
    {
       $(el).siblings().removeClass('active');
       $(el).addClass('active'); 
    }
    var cssurls = {};
    var jsurls = {};

        cssurls['3.3.0'] = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css';
    jsurls['3.3.0'] = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js';
        cssurls['3.2.0'] = '//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css';
    jsurls['3.2.0'] = '//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js';
        cssurls['3.1.0'] = '//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css';
    jsurls['3.1.0'] = '//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js';
        cssurls['3.0.3'] = '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css';
    jsurls['3.0.3'] = '//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js';
        cssurls['3.0.1'] = '//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css';
    jsurls['3.0.1'] = '//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js';
        cssurls['3.0.0'] = '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css';
    jsurls['3.0.0'] = '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js';
        cssurls['2.3.2'] = '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css';
    jsurls['2.3.2'] = '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js';
        

    function buildSource(htmleditor, jseditor, csseditor)
    {   
        var code = {};
        code.html = htmleditor.getValue();
        code.css = csseditor.getValue();
        code.js = jseditor.getValue();
        code.bootstrapcss = cssurls[version];
        code.bootstrapjs = jsurls[version];

        var template = "<!doctype html>\n\
                        <html>\n\
                            <head>\n\
                                <meta charset='utf-8'>\n\
                                <meta name='viewport' content='width=device-width, initial-scale=1'>\n\
                                <title>Snippet - Bootsnipp.com</title>\n\
                                <link href='|bootstrapcss|' rel='stylesheet'>\n\
                                <style>|css|\x3C/style>\n\
                                \x3Cscript type='text/javascript' src='//code.jquery.com/jquery-1.10.2.min.js'>\x3C/script>\n\
                                \x3Cscript type='text/javascript' src='|bootstrapjs|'>\x3C/script>\n\
                                \x3Cscript type='text/javascript'>|js|\x3C/script>\n\
                            </head>\n\
                            <body>\n\
                            |html|\n\
                            </body>\n\
                        </html>";

        content = template.replace(/\|(\w+)\|/g, function(match, str)
        {
            if(str in code) return code[str];
            return '';
        });   
                        
        return content;
    }

    var submitsnippet   = $('#submitsnippet');
    var thankyou        = $('#thankyou');
    var errorlist       = $('#error-list');
    var hideable        = $('.hideable');
    thankyou.hide();    
    submitsnippet.submit(function(e){
        e.preventDefault();
        if(snippetSaved){
            submitsnippet.spin();
            $.ajax({
                url: 'http://bootsnipp.com/api/snippets',
                type: 'POST',
                dataType: 'json',
                data: $('form#submitsnippet').serialize(),
                success: function(data) {
                    submitsnippet.spin(false);
                    hideable.fadeOut();         
                    thankyou.fadeIn('slow');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    submitsnippet.spin(false);
                    alert('Error submitting snippet, please try again!');
                }
            });
        } else {
            alert('Please save the snippet first');
        }
        return false;
    });
})(jQuery);
</script>