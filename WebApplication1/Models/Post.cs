using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebApplication1.Models
{
    public class Post
    {
        public int PostId { get; set; }
        public int PostUserId { get; set; }
        public int PostTopicId { get; set; }
        public string PostTitle { get; set; }
        public string PostText{ get; set; }
        
    }
}
