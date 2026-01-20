const dashboardData = {
  participant: {
    upcomingEvents: [
      {
        id: 1,
        title: "AI & Machine Learning Workshop",
        date: "March 20, 2024",
        time: "2:00 PM - 5:00 PM",
        location: "Computer Science Lab",
        status: "registered"
      },
      {
        id: 2,
        title: "Spring Career Fair 2024",
        date: "March 25, 2024",
        time: "10:00 AM - 4:00 PM",
        location: "Student Union Building",
        status: "waitlist"
      }
    ],
    pastEvents: [
      {
        id: 3,
        title: "Research Symposium 2024",
        date: "March 12, 2024",
        rating: 5,
        certificate: true
      },
      {
        id: 4,
        title: "Startup Pitch Competition",
        date: "March 8, 2024",
        rating: 4,
        certificate: false
      }
    ],
    achievements: [
      { title: "Event Enthusiast", description: "Attended 10+ events", icon: "trophy", earned: true },
      { title: "Network Builder", description: "Connected with 50+ peers", icon: "people", earned: true },
      { title: "Learning Champion", description: "Completed 5 workshops", icon: "book", earned: false }
    ]
  },
  
  organizer: {
    events: [
      {
        id: 1,
        title: "AI & Machine Learning Workshop",
        date: "March 20, 2024",
        status: "published",
        registered: 45,
        capacity: 60,
        views: 234
      },
      {
        id: 2,
        title: "Tech Career Networking Event",
        date: "March 28, 2024",
        status: "draft",
        registered: 0,
        capacity: 100,
        views: 12
      },
      {
        id: 3,
        title: "Innovation Summit 2024",
        date: "March 15, 2024",
        status: "completed",
        registered: 180,
        capacity: 200,
        views: 892
      }
    ],
    pendingApprovals: [
      {
        id: 1,
        participant: "Alice Johnson",
        event: "AI Workshop",
        appliedDate: "March 10, 2024",
        email: "alice@university.edu"
      },
      {
        id: 2,
        participant: "Bob Chen",
        event: "AI Workshop",
        appliedDate: "March 11, 2024",
        email: "bob@university.edu"
      }
    ]
  },
  
  admin: {
    events: [
      {
        id: 1,
        title: "AI & Machine Learning Workshop",
        organizer: "Sarah Mitchell",
        date: "March 20, 2024",
        status: "approved",
        participants: 45
      },
      {
        id: 2,
        title: "Blockchain Technology Seminar",
        organizer: "John Davis",
        date: "March 25, 2024",
        status: "pending",
        participants: 0
      },
      {
        id: 3,
        title: "Career Development Workshop",
        organizer: "Emily Chen",
        date: "March 18, 2024",
        status: "completed",
        participants: 78
      }
    ],
    pendingUsers: [
      {
        id: 1,
        name: "Michael Johnson",
        email: "michael@university.edu",
        role: "organizer",
        department: "Computer Science",
        requestDate: "March 10, 2024"
      },
      {
        id: 2,
        name: "Lisa Wang",
        email: "lisa@university.edu",
        role: "organizer",
        department: "Business School",
        requestDate: "March 12, 2024"
      }
    ],
    systemAlerts: [
      { id: 1, type: "warning", message: "High server load detected", time: "10 minutes ago" },
      { id: 2, type: "info", message: "Database backup completed", time: "2 hours ago" },
      { id: 3, type: "error", message: "Email service temporarily unavailable", time: "4 hours ago" }
    ]
  }
};

// ===== DASHBOARD NAMESPACE =====
window.Dashboard = {
  // Initialize participant dashboard
  initializeParticipant: function() {
    this.renderUpcomingEvents();
    this.renderPastEvents();
    this.renderAchievements();
    this.setupEventListeners();
  },

  // Initialize organizer dashboard
  initializeOrganizer: function() {
    this.renderOrganizerEvents();
    this.renderPendingApprovals();
    this.setupEventListeners();
  },

  // Initialize admin dashboard
  initializeAdmin: function() {
    this.renderAdminEvents();
    this.renderAdminApprovals();
    this.renderSystemAlerts();
    this.setupEventListeners();
  },

  // Setup common event listeners
  setupEventListeners: function() {
    // Toast notifications for button clicks
    document.addEventListener('click', function(e) {
      if (e.target.matches('.btn-gradient-primary, .btn-success, .btn-outline-primary')) {
        const action = e.target.textContent.trim();
        Dashboard.showToast(`Action: ${action}`, 'info');
      }
    });
  },

  // ===== PARTICIPANT DASHBOARD METHODS =====
  renderUpcomingEvents: function() {
    const container = document.getElementById('upcomingEvents');
    if (!container) return;

    const events = dashboardData.participant.upcomingEvents;
    container.innerHTML = events.map(event => `
      <div class="border rounded-3 p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h6 class="fw-semibold mb-2">${event.title}</h6>
            <div class="small text-muted">
              <div class="d-flex align-items-center mb-1">
                <i class="bi bi-calendar3 me-2"></i>
                <span>${event.date}</span>
              </div>
              <div class="d-flex align-items-center mb-1">
                <i class="bi bi-clock me-2"></i>
                <span>${event.time}</span>
              </div>
              <div class="d-flex align-items-center">
                <i class="bi bi-geo-alt me-2"></i>
                <span>${event.location}</span>
              </div>
            </div>
          </div>
          <div class="text-end">
            <span class="badge ${event.status === 'registered' ? 'badge-success-soft' : 'badge-warning-soft'} mb-2">
              ${event.status === 'registered' ? 'Registered' : 'Waitlist'}
            </span>
            <br>
            <button class="btn btn-outline-primary btn-sm">View Details</button>
          </div>
        </div>
      </div>
    `).join('');
  },

  renderPastEvents: function() {
    const container = document.getElementById('pastEvents');
    if (!container) return;

    const events = dashboardData.participant.pastEvents;
    container.innerHTML = events.map(event => `
      <div class="border rounded-3 p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h6 class="fw-semibold mb-2">${event.title}</h6>
            <div class="small text-muted">
              <span class="me-3">${event.date}</span>
              <span class="me-3">
                <i class="bi bi-star-fill text-warning me-1"></i>
                ${event.rating}/5
              </span>
              ${event.certificate ? '<span class="badge bg-secondary">Certificate Earned</span>' : ''}
            </div>
          </div>
          <div class="text-end">
            <button class="btn btn-outline-primary btn-sm me-2">View Photos</button>
            ${event.certificate ? '<button class="btn btn-outline-success btn-sm">Download Certificate</button>' : ''}
          </div>
        </div>
      </div>
    `).join('');
  },

  renderAchievements: function() {
    const container = document.getElementById('achievementsGrid');
    if (!container) return;

    const achievements = dashboardData.participant.achievements;
    container.innerHTML = achievements.map(achievement => `
      <div class="col-md-4">
        <div class="text-center p-4 border rounded-3 ${achievement.earned ? 'border-success bg-success bg-opacity-5' : 'bg-light'}">
          <i class="bi bi-${achievement.icon} display-6 ${achievement.earned ? 'text-success' : 'text-muted'} mb-3"></i>
          <h6 class="fw-semibold mb-2">${achievement.title}</h6>
          <p class="small text-muted mb-3">${achievement.description}</p>
          ${achievement.earned ? 
            '<span class="badge badge-success-soft">Earned!</span>' : 
            '<div class="progress" style="height: 8px;"><div class="progress-bar bg-info" style="width: 60%"></div></div>'
          }
        </div>
      </div>
    `).join('');
  },

  // ===== ORGANIZER DASHBOARD METHODS =====
  renderOrganizerEvents: function() {
    const container = document.getElementById('organizerEvents');
    if (!container) return;

    const events = dashboardData.organizer.events;
    container.innerHTML = events.map(event => `
      <div class="border rounded-3 p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <div class="d-flex align-items-center gap-3 mb-2">
              <h6 class="fw-semibold mb-0">${event.title}</h6>
              <span class="badge ${this.getStatusClass(event.status)}">${event.status}</span>
            </div>
            <div class="small text-muted">
              <span class="me-4">
                <i class="bi bi-calendar3 me-1"></i>
                ${event.date}
              </span>
              <span class="me-4">
                <i class="bi bi-people me-1"></i>
                ${event.registered}/${event.capacity} registered
              </span>
              <span>
                <i class="bi bi-eye me-1"></i>
                ${event.views} views
              </span>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-eye me-1"></i>
              View
            </button>
            <button class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-pencil me-1"></i>
              Edit
            </button>
            <button class="btn btn-outline-danger btn-sm">
              <i class="bi bi-trash me-1"></i>
              Delete
            </button>
          </div>
        </div>
      </div>
    `).join('');
  },

  renderPendingApprovals: function() {
    const container = document.getElementById('pendingApprovals');
    if (!container) return;

    const approvals = dashboardData.organizer.pendingApprovals;
    container.innerHTML = approvals.map(approval => `
      <div class="border rounded-3 p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h6 class="fw-semibold mb-2">${approval.participant}</h6>
            <div class="small text-muted">
              <div>Event: ${approval.event}</div>
              <div>Applied: ${approval.appliedDate}</div>
              <div>Email: ${approval.email}</div>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-success btn-sm">
              <i class="bi bi-check-circle me-1"></i>
              Approve
            </button>
            <button class="btn btn-outline-danger btn-sm">Decline</button>
          </div>
        </div>
      </div>
    `).join('');
  },

  // ===== ADMIN DASHBOARD METHODS =====
  renderAdminEvents: function() {
    const container = document.getElementById('adminEvents');
    if (!container) return;

    const events = dashboardData.admin.events;
    container.innerHTML = events.map(event => `
      <div class="border rounded-3 p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <div class="d-flex align-items-center gap-3 mb-2">
              <h6 class="fw-semibold mb-0">${event.title}</h6>
              <span class="badge ${this.getStatusClass(event.status)}">${event.status}</span>
            </div>
            <div class="small text-muted">
              <div>Organizer: ${event.organizer}</div>
              <div>Date: ${event.date} • Participants: ${event.participants}</div>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-primary btn-sm">
              <i class="bi bi-eye me-1"></i>
              View Details
            </button>
            ${event.status === 'pending' ? `
              <button class="btn btn-success btn-sm">
                <i class="bi bi-check-circle me-1"></i>
                Approve
              </button>
              <button class="btn btn-outline-danger btn-sm">
                <i class="bi bi-x-circle me-1"></i>
                Reject
              </button>
            ` : ''}
          </div>
        </div>
      </div>
    `).join('');
  },

  renderAdminApprovals: function() {
    const container = document.getElementById('adminApprovals');
    if (!container) return;

    const users = dashboardData.admin.pendingUsers;
    container.innerHTML = users.map(user => `
      <div class="border rounded-3 p-3 mb-3">
        <div class="d-flex justify-content-between align-items-start">
          <div class="d-flex align-items-center">
            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
              <span class="fw-bold text-primary">${user.name.split(' ').map(n => n[0]).join('')}</span>
            </div>
            <div>
              <h6 class="fw-semibold mb-1">${user.name}</h6>
              <div class="small text-muted">
                <div>${user.email}</div>
                <div>${user.department} • Requested ${user.requestDate}</div>
              </div>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-success btn-sm">
              <i class="bi bi-person-check me-1"></i>
              Approve
            </button>
            <button class="btn btn-outline-danger btn-sm">
              <i class="bi bi-person-x me-1"></i>
              Reject
            </button>
          </div>
        </div>
      </div>
    `).join('');
  },

  renderSystemAlerts: function() {
    const container = document.getElementById('systemAlerts');
    if (!container) return;

    const alerts = dashboardData.admin.systemAlerts;
    container.innerHTML = alerts.map(alert => `
      <div class="d-flex justify-content-between align-items-center border rounded-3 p-3 mb-3">
        <div class="d-flex align-items-center">
          ${alert.type === 'error' ? '<i class="bi bi-x-circle text-danger me-3"></i>' :
            alert.type === 'warning' ? '<i class="bi bi-exclamation-triangle text-warning me-3"></i>' :
            '<i class="bi bi-info-circle text-info me-3"></i>'
          }
          <span>${alert.message}</span>
        </div>
        <small class="text-muted">${alert.time}</small>
      </div>
    `).join('');
  },

  // ===== UTILITY METHODS =====
  getStatusClass: function(status) {
    const statusClasses = {
      'published': 'badge-success-soft',
      'approved': 'badge-success-soft',
      'draft': 'badge-warning-soft',
      'pending': 'badge-warning-soft',
      'completed': 'bg-light text-muted',
      'rejected': 'bg-danger bg-opacity-10 text-danger border border-danger border-opacity-20'
    };
    return statusClasses[status] || 'bg-light text-muted';
  },

  showToast: function(message, type = 'info') {
    // Create toast container if it doesn't exist
    let container = document.getElementById('toast-container');
    if (!container) {
      container = document.createElement('div');
      container.id = 'toast-container';
      container.className = 'toast-container position-fixed bottom-0 end-0 p-3';
      container.style.zIndex = '1080';
      document.body.appendChild(container);
    }

    // Create toast element
    const toastElement = document.createElement('div');
    toastElement.className = `toast align-items-center text-bg-${type} border-0`;
    toastElement.setAttribute('role', 'alert');
    toastElement.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">${message}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    `;

    container.appendChild(toastElement);
    const toast = new bootstrap.Toast(toastElement);
    toast.show();

    // Remove element after toast is hidden
    toastElement.addEventListener('hidden.bs.toast', () => {
      toastElement.remove();
    });
  }
};

// ===== AUTO-INITIALIZE PARTICIPANT DASHBOARD =====
document.addEventListener('DOMContentLoaded', function() {
  // Check which dashboard page we're on and initialize accordingly
  if (document.getElementById('upcomingEvents')) {
    Dashboard.initializeParticipant();
  }
});

// ===== EXPORT FOR GLOBAL ACCESS =====
window.Dashboard = Dashboard;