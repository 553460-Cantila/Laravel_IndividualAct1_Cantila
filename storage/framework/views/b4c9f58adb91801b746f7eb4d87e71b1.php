<!DOCTYPE html>
<html>
<head>
    <title>Candidates</title>
</head>
<body>
    <h1>Add candidate</h1>
    <form method="POST" action="/candidates/store">
        <?php echo csrf_field(); ?>
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br><br>
        <label>Middle Name:</label><br>
        <input type="text" name="middle_name"><br><br>
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>
        <label>Gender:</label><br>
        <input type="text" name="gender" required><br><br>  
        <label>Address:</label><br>
        <input type="text" name="address" required><br><br>
        <label>Position:</label><br>
        <input type="text" name="position" required><br><br>
        <label>Party:</label><br>
        <input type="text" name="party"><br><br>

        <button type="submit">Save</button>
    </form>

    <hr>

    <h1>Candidate List</h1>

    <form method="GET" action="<?php echo e(url('/candidates')); ?>">
        <input type="text" name="search" placeholder="Search" value="<?php echo e(request('search')); ?>">
        <button type="submit">Search</button>
        <?php if(request('search')): ?>
            <a href="<?php echo e(url('/candidates')); ?>">Clear</a>
        <?php endif; ?>
    </form>
    <br>

    <table border="1" cellpadding="10">
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Position</th>
            <th>Party</th>
            <th>Actions</th>
        </tr>

        <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($candidate->first_name); ?></td>
            <td><?php echo e($candidate->middle_name); ?></td>
            <td><?php echo e($candidate->last_name); ?></td>
            <td><?php echo e($candidate->gender); ?></td>
            <td><?php echo e($candidate->address); ?></td>
            <td><?php echo e($candidate->position); ?></td>
            <td><?php echo e($candidate->party); ?></td>
            <td>
                <a href="/candidates/edit/<?php echo e($candidate->id); ?>">Edit</a>
                |
                <a href="/candidates/delete/<?php echo e($candidate->id); ?>" onclick="return confirm('Are you sure you want to delete this candidate?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html><?php /**PATH C:\Users\Lenovo\Desktop\Laravel\Laravel_IndividualAct1_Cantila\resources\views/index.blade.php ENDPATH**/ ?>