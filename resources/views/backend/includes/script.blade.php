 <script src="{{asset('backend/assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('backend/assets/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('backend/assets/js/chart.js')}}"></script>
    <script src="{{asset('backend/assets/js/app.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Gradient for Line Chart
  var ctx1 = document.getElementById("linegraph").getContext("2d");
  var gradient = ctx1.createLinearGradient(0, 0, 0, 300);
  gradient.addColorStop(0, "rgba(26,179,148,0.4)");
  gradient.addColorStop(1, "rgba(255,255,255,0)");

  // Line Chart
  new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [{
        label: "Patients",
        data: [10, 15, 8, 12, 20, 18],
        backgroundColor: gradient,
        borderColor: "#1ab394",
        borderWidth: 3,
        pointBackgroundColor: "#293846",
        pointBorderColor: "#fff",
        pointRadius: 5,
        tension: 0.4 // smooth curve
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false }
      }
    }
  });

  // Bar Chart
  var ctx2 = document.getElementById("bargraph").getContext("2d");
  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ["ICU", "OPD", "Ward", "Emergency"],
      datasets: [{
        label: "Patients",
        data: [12, 19, 7, 10],
        backgroundColor: [
          "#1ab394",
          "#f8ac59",
          "#ed5565",
          "#23c6c8"
        ],
        borderRadius: 8, // round corners
        borderWidth: 0
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          grid: { color: "rgba(0,0,0,0.05)" },
          ticks: { color: "#666" }
        },
        x: {
          grid: { display: false },
          ticks: { color: "#666" }
        }
      }
    }
  });

  document.addEventListener("DOMContentLoaded", function() {
  const progressBars = document.querySelectorAll(".item-progress");
  progressBars.forEach(bar => {
    let percent = bar.getAttribute("data-percent");
    bar.style.width = percent + "%";
  });
});
</script>
