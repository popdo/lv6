@extends('layouts.app')
@section('title','编辑文章')

@section('content')
<div class="container">
    <form action="{{ route('blogs.update',$blog->id) }}" method="post">
    <div class="row">
        <div class="col-md-10">
                @csrf
                @method('PATCH')
                <div class="field">
                    <label for="">文章标题</label>
                    <input class="form-item" type="text" name="title" value="{{ $blog->title }}">
                </div>
                <div class="field">
                    <label for="">文章别名</label>
                    <input class="form-item" type="text" name="name" value="{{ $blog->name }}">
                </div>
                <div class="field">
                    <textarea name="content" id="postTextArea" cols="30" rows="10">{{ $blog->content }}</textarea>
                </div>
                <div class="field">
                    <button class="btn btn-primary publish-btn" type="submit">提 交</button>
                </div>
            </div>
            <div class="col-md-2">
                
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<link href="https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.css" rel="stylesheet">
<link href="https://at.alicdn.com/t/font_1416426_yhlda07mku9.css" rel="stylesheet">

<style>
    .fa{font-size: 14px}
    .CodeMirror pre{font-size: 15px}
    .editor-toolbar.fullscreen{z-index: 1050}
    .CodeMirror-fullscreen{z-index: 1049}
    .editor-preview-side{z-index:1049;border-color:#eeeef1;padding: 30px;background-color: #fff}
    .editor-toolbar{border-color:#e5e5e5}
    .CodeMirror{border-color:#eeeef1}
    .editor-toolbar:before{margin-bottom:3px;}
    .editor-toolbar:after{margin-top:3px;}
    .editor-preview pre, .editor-preview-side pre{
        background: #272822;
        padding:1em;
    }
    .CodeMirror .CodeMirror-code .cm-comment{
        background: none;
        color: #0aa4d8;
        line-height: 2;
    }
    
</style>

<script src="https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js"></script>
<script src="https://cdn.bootcss.com/marked/0.7.0/marked.min.js"></script>

<script>
    var simplemde = new SimpleMDE({ 
        element: document.getElementById("postTextArea"),
        // showIcons: ["code", "table","horizontal-rule"], // 追加按钮
        previewRender: function (e) {
            return marked(e, {
                highlight: function (e, t) {
                    return Prism.languages.hasOwnProperty(t) || (t = Prism.languages[
                        t] || "php"), Prism.highlight(e, Prism.languages[t])
                }
            })
        },

        // 自定义图标顺序，留空展示编辑器默认图标数量与顺序
        toolbar: [
            "bold",
            "italic",
            "heading",
            "|",
            "quote",
            "code",
            "table",
            "horizontal-rule",
            "unordered-list",
            "ordered-list",
            "|",
            "link",
            "image",
            "|",
            "preview",
            "side-by-side",
            "fullscreen",
            "|",
            {
                name: "guide",
                action: function (e) {
                    var t = window.open(
                        "https://github.com/sparksuite/simplemde-markdown-editor",
                        "_blank");
                    t ? t.focus() : alert("Please allow popups for this website")
                },
                className: "fa fa-info-circle",
                title: "查看帮助"
            },
            // {
            //     name: "publish",
            //     action: function (t) {
            //         $(".publish-btn").click()
            //     },
            //     className: "fa fa-paper-plane",
            //     title: "发布文章"
            // }
        ],
        spellChecker: false, // 关闭拼写检测器
        // 调整预览期间解析
        // renderingConfig: {
        //     singleLineBreaks: false,
        //     codeSyntaxHighlighting: true
        // },
        autoDownloadFontAwesome:false, // 是否自动下载FontAwesome图标

    });
</script>
@endsection