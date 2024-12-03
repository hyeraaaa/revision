<?php
require_once '../login/dbh.inc.php';

?>
<div class="card mb-3">
    <div class="profile-container-2 d-flex px-3 pt-3">
        <div class="profile-pic">
            <a href="profile-landing.php?id=<?php echo htmlspecialchars($row['admin_id']); ?>"> <!-- Use the appropriate identifier -->
                <img src="<?php echo 'uploads/' . htmlspecialchars($row['profile_picture']); ?>" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 30px;height: 30px;object-fit: cover;border-radius: 50%;">
            </a>
        </div>
        <a href="profile-landing.php?id=<?php echo htmlspecialchars($row['admin_id']); ?>" style="text-decoration: none; color:black">
            <p class="ms-2 mt-1"><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></p>
        </a>
    </div>
    <?php if (!empty($row['image'])): ?>
        <div class="image-container mx-3" style="position: relative; overflow: hidden;">
            <div class="blur-background"></div>
            <a href="uploads/<?php echo htmlspecialchars($row['image']); ?>" data-lightbox="image-<?php echo $row['announcement_id']; ?>" data-title="<?php echo htmlspecialchars($row['title']); ?>">
                <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Post Image" class="img-fluid">
                <script src="../admin/js/blur.js"></script>
            </a>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
        <div class="card-text">
            <p class="mb-2"><?php echo htmlspecialchars($row['description']); ?></p>

            Tags:
            <?php
            $all_tags = array_merge(explode(',', $row['year_levels']), explode(',', $row['departments']), explode(',', $row['courses']));
            foreach ($all_tags as $tag) : ?>
                <span class="badge rounded-pill bg-danger mb-2"><?php echo htmlspecialchars(trim($tag)); ?></span>
            <?php endforeach; ?>
        </div>

        <small>Updated at <?php echo htmlspecialchars(date('F d, Y', strtotime($row['updated_at']))); ?></small>
    </div>
</div>