<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

$document_content = <<<DOCUMENT_CONTENT
  <div id="toc">
     <h3>Table of Contents</h3>
  </div>
  <div id="contents">
     <h1>Main Heading (h1)</h1>
     <h2>Second level heading (h2)</h2>
     <h2>Another heading (h2)</h2>
     <h3>Sub heading (h3)</h3>
     <h2>One more second level heading (h2)</h2>
  </div>

  <script>
    window.onload = function () {
      var toc = "";
      var level = 0;

      document.getElementById("contents").innerHTML =
      document.getElementById("contents").innerHTML.replace(/<h([\d])>([^<]+)<\/h([\d])>/gi,
        function (str, openLevel, titleText, closeLevel) {
          if (openLevel != closeLevel) {
            return str;
          }

          if (openLevel > level) {
            toc += (new Array(openLevel - level + 1)).join("<ul>");
          } else if (openLevel < level) {
            toc += (new Array(level - openLevel + 1)).join("</ul>");
          }

          level = parseInt(openLevel);

          var anchor = titleText.replace(/ /g, "_");
          toc += "<li><a href=\"#" + anchor + "\">" + titleText + "</a></li>";

          return "<h" + openLevel + "><a name=\"" + anchor + "\">" + titleText + "</a></h" + closeLevel + ">";
        }
      );

      if (level) {
        toc += (new Array(level + 1)).join("</ul>");
      }

      document.getElementById("toc").innerHTML += toc;
    };
  </script>

  <style>
    #toc li a::after {
      content: " | Page " target-counter(attr(href), page);
    }
  </style>
DOCUMENT_CONTENT;

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("pdf");
    $doc->setDocumentContent($document_content);
    # $doc->setDocumentUrl("https://docraptor.com/examples/invoice.html");
    $doc->setJavascript(true);
    # $prince_options = new DocRaptor\PrinceOptions();
    # $doc->setPrinceOptions($prince_options);
    # $prince_options->setMedia("print"); # @media 'screen' or 'print' CSS
    # $prince_options->setBaseurl("https://yoursite.com"); # the base URL for any relative URLs

    $response = $docraptor->createDoc($doc);

    # createDoc() returns a binary string
    file_put_contents("table-of-contents.pdf", $response);
    echo "Successfully created table-of-contents.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
