<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

$document_content = <<<DOCUMENT_CONTENT
  <h2>Vector Images</h2>
  <div class="external-svg"></div>
  <div class="inline-svg">
    <svg viewBox="0 0 60 43" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <defs>
        <path id="a" d="M5.823.355l-5.448 5.5h13.008l-7.56-5.5" />
        <mask id="o" fill="#fff">
          <use xlink:href="#a" />
        </mask>
        <path id="b" d="M5.823.355l-5.448 5.5 5.448-5.5" />
        <mask id="p" fill="#fff">
          <use xlink:href="#b" />
        </mask>
        <path d="M.467 6.437l1.863.322-1.863-.324m6.306-6.73l-.06.066 2.185 3.374-2.125-3.44" id="c" />
        <mask id="q" fill="#fff">
          <use xlink:href="#c" />
        </mask>
        <path id="d" d="M6.712-.228L.467 6.437l1.863.322 6.568-3.615L6.712-.228" />
        <mask id="r" fill="#fff">
          <use xlink:href="#d" />
        </mask>
        <path id="e" d="M2.303-.037L-.13 13.123l1.964.34 1.88-13 .01-.054-1.42-.448" />
        <mask id="s" fill="#fff">
          <use xlink:href="#e" />
        </mask>
        <path id="f" d="M2.303-.037L-.13 13.123l1.964.34 1.88-13 .01-.054-1.42-.448" />
        <mask id="t" fill="#fff">
          <use xlink:href="#f" />
        </mask>
        <path id="g" d="M-.277.41l-.008.05.008-.05" />
        <mask id="u" fill="#fff">
          <use xlink:href="#g" />
        </mask>
        <path id="h" d="M-.277.41l-.008.05.008-.05" />
        <mask id="v" fill="#fff">
          <use xlink:href="#h" />
        </mask>
        <path id="i" d="M9.49.093L.066 12.003 9.49.093" />
        <mask id="w" fill="#fff">
          <use xlink:href="#i" />
        </mask>
        <path id="j" d="M9.49.094L.067 12.004l15.216-2.856-.02-3.672L9.49.094" />
        <mask id="x" fill="#fff">
          <use xlink:href="#j" />
        </mask>
        <path id="k" d="M.26.476l.022 3.672L.262.475" />
        <mask id="y" fill="#fff">
          <use xlink:href="#k" />
        </mask>
        <path id="l" d="M8.418.436L.066 2.004l9.73 8.173-1.38-9.74" />
        <mask id="z" fill="#fff">
          <use xlink:href="#l" />
        </mask>
        <path id="m" d="M-.08-.13l9.915 1.275 2.683 10.564L9.835 1.143-.08-.128" />
        <mask id="A" fill="#fff">
          <use xlink:href="#m" />
        </mask>
        <path id="n" d="M2.92-.13L-.165 21.88l5.33.88L15.52 11.71 12.835 1.146 2.92-.128" />
        <mask id="B" fill="#fff">
          <use xlink:href="#n" />
        </mask>
      </defs>
      <g fill="none" fill-rule="evenodd">
        <path d="M24.283 27.147L9.066 30.004l9.426-11.91 5.77 5.382.02 3.67" fill="#253B76" />
        <path d="M52.898 25.146l-5.48-8.46-8.11-2.76-2.44 13.198 9.462 1.635 6.568-3.615" fill="#24366C" />
        <path d="M9.066 30.004l9.73 8.173-1.378-9.74-8.352 1.567" fill="#252E65" />
        <path d="M24.375 42.855h13.008l-7.56-5.5-5.448 5.5" fill="#243B77" />
        <path d="M50.217-.098l9.41 5.97v2.273L41.92 5.87l8.297-5.968" fill="#3877B1" />
        <path d="M52.898 25.146l-1.214 5.21-1.82-3.54 3.034-1.67" fill="#242C62" />
        <path d="M39.415 13.37L-.08.77l24.34 22.706L39.416 13.37" fill="#E5E1DB" />
        <path d="M39.415 13.37l-3.347 17.68-11.693 11.805-.114-19.38L39.417 13.37" fill="#144C8E" />
        <path d="M51.835 7.145l2.683 10.564-10.353 11.05-5.33-.883L41.92 5.87l9.915 1.275" fill="#1C5C9E" />
        <path d="M39.415 13.37L-.08.77l24.34 22.706L39.416 13.37" fill="#135697" />
        <path d="M5.823.355l-5.448 5.5h13.008l-7.56-5.5" mask="url(#o)" transform="translate(24 37)" />
        <path d="M5.823.355l-5.448 5.5 5.448-5.5" mask="url(#p)" transform="translate(24 37)" />
        <path d="M.467 6.437l1.863.322-1.863-.324m6.306-6.73l-.06.066 2.185 3.374-2.125-3.44" mask="url(#q)"
          transform="translate(44 22)" />
        <path d="M6.712-.228L.467 6.437l1.863.322 6.568-3.615L6.712-.228" mask="url(#r)" transform="translate(44 22)" />
        <path d="M2.303-.037L-.13 13.123l1.964.34 1.88-13 .01-.054-1.42-.448" mask="url(#s)"
          transform="translate(37 14)" />
        <path d="M2.303-.037L-.13 13.123l1.964.34 1.88-13 .01-.054-1.42-.448" mask="url(#t)"
          transform="translate(37 14)" />
        <path d="M-.277.41l-.008.05.008-.05" mask="url(#u)" transform="translate(41 14)" />
        <path d="M-.277.41l-.008.05.008-.05" mask="url(#v)" transform="translate(41 14)" />
        <path d="M9.49.093L.066 12.003 9.49.093" mask="url(#w)" transform="translate(9 18)" />
        <path d="M9.49.094L.067 12.004l15.216-2.856-.02-3.672L9.49.094" mask="url(#x)" transform="translate(9 18)" />
        <path d="M.26.476l.022 3.672L.262.475" mask="url(#y)" transform="translate(24 23)" />
        <path d="M8.418.436L.066 2.004l9.73 8.173-1.38-9.74" mask="url(#z)" transform="translate(9 28)" />
        <path d="M-.08-.13l9.915 1.275 2.683 10.564L9.835 1.143-.08-.128" mask="url(#A)" transform="translate(42 6)" />
        <path d="M2.92-.13L-.165 21.88l5.33.88L15.52 11.71 12.835 1.146 2.92-.128" mask="url(#B)"
          transform="translate(39 6)" />
        <image x="46.92" y="26" width="4.8" height="-4.8"
          xlink:href="data:image/png;base64,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" />
      </g>
    </svg>
  </div>

  <style>
    div.external-svg {
      background-image: url(https://docraptor-production-cdn.s3.amazonaws.com/tutorials/raptor.svg);
      background-size: 240px;
      background-color: black;
      width: 240px;
      height: 172px;
    }
    div.inline-svg {
      background-color: #fe7816;
      width: 240px;
    }
  </style>
DOCUMENT_CONTENT;

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("pdf");
    $doc->setDocumentContent($document_content);
    # $doc->setDocumentUrl("https://docraptor.com/examples/invoice.html");
    # $doc->setJavascript(false);
    # $prince_options = new DocRaptor\PrinceOptions();
    # $doc->setPrinceOptions($prince_options);
    # $prince_options->setMedia("print"); # @media 'screen' or 'print' CSS
    # $prince_options->setBaseurl("https://yoursite.com"); # the base URL for any relative URLs

    $response = $docraptor->createDoc($doc);

    # createDoc() returns a binary string
    file_put_contents("vector-images.pdf", $response);
    echo "Successfully created vector-images.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
