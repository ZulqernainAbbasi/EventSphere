const eventsData = [
  {
    id: 1,
    title: "AI & Machine Learning Workshop",
    description: "Learn the fundamentals of AI and machine learning with hands-on projects and industry experts.",
    date: "March 20, 2024",
    time: "2:00 PM - 5:00 PM",
    location: "Computer Science Lab",
    attendees: 45,
    maxAttendees: 60,
    category: "Technology",
    status: "upcoming",
    organizer: "CS Department",
    views: 234
  },
  {
    id: 2,
    title: "Spring Career Fair 2024",
    description: "Connect with top employers and explore internship and job opportunities across various industries.",
    date: "March 25, 2024",
    time: "10:00 AM - 4:00 PM",
    location: "Student Union Building",
    attendees: 180,
    maxAttendees: 300,
    category: "Career",
    status: "upcoming",
    organizer: "Career Services",
    views: 456
  },
  {
    id: 3,
    title: "International Food Festival",
    description: "Taste authentic cuisines from around the world while celebrating cultural diversity on campus.",
    date: "March 18, 2024",
    time: "12:00 PM - 6:00 PM",
    location: "Campus Quad",
    attendees: 220,
    maxAttendees: 250,
    category: "Cultural",
    status: "ongoing",
    organizer: "International Students Association",
    views: 789
  },
  {
    id: 4,
    title: "Research Symposium 2024",
    description: "Undergraduate and graduate students present their research findings across all academic disciplines.",
    date: "March 12, 2024",
    time: "9:00 AM - 5:00 PM",
    location: "Main Auditorium",
    attendees: 150,
    maxAttendees: 200,
    category: "Academic",
    status: "past",
    organizer: "Research Office",
    views: 892
  },
  {
    id: 5,
    title: "Mental Health Awareness Week",
    description: "Join us for workshops, discussions, and activities focused on student wellbeing and mental health.",
    date: "March 30, 2024",
    time: "All Week",
    location: "Various Locations",
    attendees: 85,
    maxAttendees: 150,
    category: "Wellness",
    status: "upcoming",
    organizer: "Counseling Center",
    views: 167
  },
  {
    id: 6,
    title: "Startup Pitch Competition",
    description: "Student entrepreneurs present their innovative business ideas to a panel of industry judges.",
    date: "March 8, 2024",
    time: "1:00 PM - 8:00 PM",
    location: "Business Building",
    attendees: 95,
    maxAttendees: 120,
    category: "Entrepreneurship",
    status: "past",
    organizer: "Business School",
    views: 345
  }
];

// Sample data for media gallery
const mediaData = [
  {
    id: 1,
    title: "Tech Innovation Summit Highlights",
    type: "video",
    event: "Tech Innovation Summit 2024",
    date: "March 15, 2024",
    thumbnail: "https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=250&fit=crop",
    views: "1.2k views"
  },
  {
    id: 2,
    title: "Cultural Festival Performances",
    type: "gallery",
    event: "Cultural Heritage Festival",
    date: "March 22, 2024",
    thumbnail: "https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=400&h=250&fit=crop",
    views: "24 photos"
  },
  {
    id: 3,
    title: "Research Showcase Presentations",
    type: "video",
    event: "Academic Research Showcase",
    date: "March 28, 2024",
    thumbnail: "https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=400&h=250&fit=crop",
    views: "856 views"
  },
  {
    id: 4,
    title: "Career Fair Networking",
    type: "gallery",
    event: "Spring Career Fair 2024",
    date: "March 25, 2024",
    thumbnail: "https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=400&h=250&fit=crop",
    views: "32 photos"
  },
  {
    id: 5,
    title: "AI Workshop Demo Sessions",
    type: "video",
    event: "AI & Machine Learning Workshop",
    date: "March 20, 2024",
    thumbnail: "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&h=250&fit=crop",
    views: "2.1k views"
  },
  {
    id: 6,
    title: "Student Life Moments",
    type: "gallery",
    event: "Campus Activities",
    date: "Various Dates",
    thumbnail: "https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=400&h=250&fit=crop",
    views: "15 photos"
  }
];

// Global variables for filtering
let filteredEvents = [...eventsData];
let currentFilters = {
  search: '',
  category: '',
  status: '',
  location: ''
};

// ===== DOM CONTENT LOADED =====
document.addEventListener('DOMContentLoaded', function() {
  initializeApp();
});

// ===== INITIALIZE APPLICATION =====
function initializeApp() {
  setupEventListeners();
  renderEvents();
  renderMediaGallery();
  initializeCarousel();
  initializeScrollEffects();
}

// ===== EVENT LISTENERS SETUP =====
function setupEventListeners() {
  // Search functionality
  const searchInput = document.getElementById('searchInput');
  if (searchInput) {
    searchInput.addEventListener('input', handleSearch);
  }

  // Filter controls
  const categoryFilter = document.getElementById('categoryFilter');
  const statusFilter = document.getElementById('statusFilter');
  const locationFilter = document.getElementById('locationFilter');
  
  if (categoryFilter) categoryFilter.addEventListener('change', handleFilterChange);
  if (statusFilter) statusFilter.addEventListener('change', handleFilterChange);
  if (locationFilter) locationFilter.addEventListener('change', handleFilterChange);

  // Quick filter buttons
  const quickFilterButtons = document.querySelectorAll('[data-filter]');
  quickFilterButtons.forEach(button => {
    button.addEventListener('click', handleQuickFilter);
  });

  // Clear filters button
  const clearFiltersBtn = document.getElementById('clearFilters');
  if (clearFiltersBtn) {
    clearFiltersBtn.addEventListener('click', clearAllFilters);
  }

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        const offsetTop = target.offsetTop - 80;
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });
}

// ===== SEARCH FUNCTIONALITY =====
function handleSearch(event) {
  currentFilters.search = event.target.value.toLowerCase();
  applyFilters();
}

function handleFilterChange(event) {
  const filterType = event.target.id.replace('Filter', '');
  currentFilters[filterType] = event.target.value;
  applyFilters();
  updateFilterCount();
}

function handleQuickFilter(event) {
  const filterType = event.target.getAttribute('data-filter');
  const filterValue = event.target.getAttribute('data-value');
  
  currentFilters[filterType] = filterValue;
  
  // Update the corresponding select element
  const selectElement = document.getElementById(filterType + 'Filter');
  if (selectElement) {
    selectElement.value = filterValue;
  }
  
  applyFilters();
  updateFilterCount();
}

function applyFilters() {
  filteredEvents = eventsData.filter(event => {
    const matchesSearch = !currentFilters.search || 
      event.title.toLowerCase().includes(currentFilters.search) ||
      event.description.toLowerCase().includes(currentFilters.search) ||
      event.organizer.toLowerCase().includes(currentFilters.search);
    
    const matchesCategory = !currentFilters.category || event.category === currentFilters.category;
    const matchesStatus = !currentFilters.status || event.status === currentFilters.status;
    const matchesLocation = !currentFilters.location || event.location === currentFilters.location;
    
    return matchesSearch && matchesCategory && matchesStatus && matchesLocation;
  });
  
  renderEvents();
}

function clearAllFilters() {
  currentFilters = {
    search: '',
    category: '',
    status: '',
    location: ''
  };
  
  // Reset form elements
  document.getElementById('searchInput').value = '';
  document.getElementById('categoryFilter').value = '';
  document.getElementById('statusFilter').value = '';
  document.getElementById('locationFilter').value = '';
  
  filteredEvents = [...eventsData];
  renderEvents();
  updateFilterCount();
}

function updateFilterCount() {
  const activeFilters = Object.values(currentFilters).filter(value => value !== '').length;
  const filterCountElement = document.getElementById('filterCount');
  const clearFiltersBtn = document.getElementById('clearFilters');
  
  if (filterCountElement) {
    if (activeFilters > 0) {
      filterCountElement.textContent = activeFilters;
      filterCountElement.classList.remove('d-none');
    } else {
      filterCountElement.classList.add('d-none');
    }
  }
  
  if (clearFiltersBtn) {
    if (activeFilters > 0) {
      clearFiltersBtn.classList.remove('d-none');
    } else {
      clearFiltersBtn.classList.add('d-none');
    }
  }
}

// ===== EVENT RENDERING =====
function renderEvents() {
  const eventsGrid = document.getElementById('eventsGrid');
  if (!eventsGrid) return;
  
  if (filteredEvents.length === 0) {
    eventsGrid.innerHTML = `
      <div class="col-12 text-center py-5">
        <div class="text-muted">
          <i class="bi bi-search fs-1 d-block mb-3"></i>
          <h4>No events found</h4>
          <p>Try adjusting your search criteria or filters.</p>
        </div>
      </div>
    `;
    return;
  }
  
  eventsGrid.innerHTML = filteredEvents.map(event => createEventCard(event)).join('');
}

function createEventCard(event) {
  const statusClass = getStatusClass(event.status);
  const categoryClass = getCategoryClass(event.category);
  
  return `
    <div class="col-lg-4 col-md-6 animate-fade-in-up">
      <div class="card event-card h-100">
        <div class="card-header border-0 bg-white">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <span class="badge ${categoryClass}">${event.category}</span>
            <span class="badge ${statusClass}">${event.status}</span>
          </div>
          <h5 class="card-title line-clamp-2">${event.title}</h5>
        </div>
        
        <div class="card-body">
          <p class="text-muted line-clamp-3 mb-4">${event.description}</p>
          
          <div class="small text-muted mb-4">
            <div class="d-flex align-items-center mb-2">
              <i class="bi bi-calendar3 text-primary me-2"></i>
              ${event.date}
            </div>
            <div class="d-flex align-items-center mb-2">
              <i class="bi bi-clock text-primary me-2"></i>
              ${event.time}
            </div>
            <div class="d-flex align-items-center mb-2">
              <i class="bi bi-geo-alt text-primary me-2"></i>
              ${event.location}
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-people text-primary me-2"></i>
              ${event.attendees}/${event.maxAttendees} attendees
            </div>
          </div>
        </div>
        
        <div class="card-footer border-0 bg-white">
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">by ${event.organizer}</small>
            <button class="btn btn-sm btn-outline-primary">
              View Details
              <i class="bi bi-arrow-right ms-1"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  `;
}

function getStatusClass(status) {
  const statusClasses = {
    'upcoming': 'badge-success-soft',
    'ongoing': 'badge-warning-soft',
    'past': 'bg-light text-muted'
  };
  return statusClasses[status] || 'bg-light text-muted';
}

function getCategoryClass(category) {
  const categoryClasses = {
    'Technology': 'badge-info-soft',
    'Career': 'badge-primary-soft',
    'Cultural': 'badge-success-soft',
    'Academic': 'badge-warning-soft',
    'Wellness': 'bg-danger bg-opacity-10 text-danger border border-danger border-opacity-20',
    'Entrepreneurship': 'badge-info-soft'
  };
  return categoryClasses[category] || 'badge-info-soft';
}

// ===== MEDIA GALLERY RENDERING =====
function renderMediaGallery() {
  const mediaGrid = document.getElementById('mediaGrid');
  if (!mediaGrid) return;
  
  mediaGrid.innerHTML = mediaData.map(item => createMediaCard(item)).join('');
}

function createMediaCard(item) {
  const typeIcon = item.type === 'video' ? 'bi-play-circle' : 'bi-images';
  const typeClass = item.type === 'video' ? 'bg-danger' : 'bg-info';
  
  return `
    <div class="col-lg-4 col-md-6 animate-fade-in-up">
      <div class="card media-card h-100">
        <div class="position-relative">
          <img src="${item.thumbnail}" alt="${item.title}" class="card-img-top" style="height: 200px; object-fit: cover;">
          
          <!-- Media Type Badge -->
          <div class="position-absolute top-0 start-0 m-3">
            <span class="badge ${typeClass} text-white">
              <i class="${typeIcon} me-1"></i>
              ${item.type === 'video' ? 'Video' : 'Gallery'}
            </span>
          </div>
          
          <!-- Play Button for Videos -->
          ${item.type === 'video' ? `
            <div class="media-overlay">
              <button class="play-button">
                <i class="bi bi-play-fill"></i>
              </button>
            </div>
          ` : ''}
          
          <!-- Views Counter -->
          <div class="position-absolute bottom-0 end-0 m-3">
            <span class="badge bg-dark bg-opacity-75 text-white">${item.views}</span>
          </div>
        </div>
        
        <div class="card-body">
          <h6 class="card-title line-clamp-2">${item.title}</h6>
          <div class="small text-muted">
            <div class="d-flex align-items-center mb-1">
              <i class="bi bi-calendar3 me-2 text-primary"></i>
              ${item.date}
            </div>
            <div class="fw-medium">${item.event}</div>
          </div>
        </div>
      </div>
    </div>
  `;
}

// ===== CAROUSEL FUNCTIONALITY =====
function initializeCarousel() {
  // Additional carousel functionality can be added here
  // Bootstrap handles the basic carousel functionality
  
  // Auto-pause on hover
  const carousel = document.getElementById('heroCarousel');
  if (carousel) {
    // Initialize Bootstrap carousel with auto-sliding
    const carouselInstance = new bootstrap.Carousel(carousel, {
      interval: 4000,  // 4 seconds between slides
      ride: 'carousel',
      pause: false,    // Don't pause on hover
      wrap: true       // Loop infinitely
    });
    carouselInstance.cycle();
  }
}

// ===== SCROLL EFFECTS =====
function initializeScrollEffects() {
  // Add scroll-based animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animationDelay = '0s';
        entry.target.classList.add('animate-fade-in-up');
      }
    });
  }, observerOptions);
  
  // Observe all cards and sections
  document.querySelectorAll('.card, .display-6').forEach(el => {
    observer.observe(el);
  });
}

// ===== NAVBAR SCROLL EFFECT =====
window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 50) {
    navbar.classList.add('shadow');
  } else {
    navbar.classList.remove('shadow');
  }
});

// ===== UTILITY FUNCTIONS =====
function showToast(message, type = 'info') {
  // Create and show Bootstrap toast
  const toastContainer = document.getElementById('toast-container') || createToastContainer();
  
  const toastElement = document.createElement('div');
  toastElement.className = `toast align-items-center text-bg-${type} border-0`;
  toastElement.setAttribute('role', 'alert');
  toastElement.innerHTML = `
    <div class="d-flex">
      <div class="toast-body">${message}</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  `;
  
  toastContainer.appendChild(toastElement);
  const toast = new bootstrap.Toast(toastElement);
  toast.show();
  
  // Remove element after toast is hidden
  toastElement.addEventListener('hidden.bs.toast', () => {
    toastElement.remove();
  });
}

function createToastContainer() {
  const container = document.createElement('div');
  container.id = 'toast-container';
  container.className = 'toast-container position-fixed bottom-0 end-0 p-3';
  container.style.zIndex = '1080';
  document.body.appendChild(container);
  return container;
}

// ===== EXPORT FOR POTENTIAL MODULE USE =====
window.CampusEvents = {
  eventsData,
  mediaData,
  renderEvents,
  renderMediaGallery,
  applyFilters,
  showToast
};