<!DOCTYPE html>
<html>
<head>

<?php session_start();?>
	
<title>Timeline</title>

<?php include '../import/timeline.html';?>

</head>

<body>

<!-- Menu-->
<?php include 'menu.php';?>

<!-- Pag -->
<main class="page-content">
					<div class="container-fluid">						
						<?php include '../php/listarTarefaTimeline.php'; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>		
	</div>
</main>

<!-- page-content" -->
</div>
</body>
</html>