<div class="container-fluid">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= base_url() ?>DiscussionGuru" class="text-primary fw-bold">Diskusi</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= base_url() ?>DiscussionGuru/all/<?= $CourseID ?>" class="text-primary fw-bold">Diskusi
                        <?= $CourseName ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= base_url() ?>DiscussionGuru/detail_discussion/<?= $thread->ForumQID ?>/<?= $thread->CourseID ?>" class="text-primary fw-bold"> <?= $thread->UserName ?></a>
                </li>
                <li class="breadcrumb-item active">
                    Edit Komentar
                </li>
            </ol>
        </nav>
    </div>
    <div class="row ms-2">
        <div class="card-forum  p-0">
            <form action="<?= base_url('DiscussionGuru/editComment__/' . $comment->ForumAID . '/' . $comment->ForumQID . '/' . $CourseID) ?>" method="post">
                <div class="form-group row">
                    <textarea name="content" id="add_answer" class=" form-control" required>
                        <?= $comment->ForumAContent ?>
                    </textarea>
                </div>
                <input type="hidden" name="CourseID" value="<?= $CourseID ?>">
                <button type="submit" class="btn btn-block bg-warning ms-2">Edit
                    Komentar</button>
            </form>
        </div>
    </div>
</div>