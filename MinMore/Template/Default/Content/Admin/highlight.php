<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Highlight {$realpath}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/styles/qtcreator_dark.min.css" />
</head>
<body>
    <h1>Highlight {$realpath}</h1>
    <pre>
        <code class="{$language}">{$content}</code>
    </pre>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
